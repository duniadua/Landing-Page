<?php

/**
 * Description of Contributor
 *
 * @author sahid
 */
class afiliasi extends CI_Controller {

    private $urlReturn = "";
    private $urlConfig = "html_config_landing";
    private $urlFooter = "footer";
    private $urlRpc = "http://www.k-linkmember.co.id/langganan_rpc/index.php/apl_rpc/";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');
        $this->load->model('param_model', 'param');
        $this->load->model('landingtype_model', 'landingtype');
        $this->load->model('affiliate_model', 'aff');
        $this->load->model('menus_model', 'menu');
    }

    public function getMember($idmember) {
        $this->xmlrpc->set_debug(false);
        $this->xmlrpc->server($this->urlRpc, 80);
        $this->xmlrpc->method('check.idmember');

        $request = array(array(
                array('idmember' => array($idmember), 'string',
                    'signature' => array(md5($idmember . '12345'), 'string')),
                'struct'
        ));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                        'fullnm' => 'Member Not Found',
                        'response' => 'false',
            )));
        } else {
            $response = $this->xmlrpc->display_response();

            if (isset($response['fullnm'])):
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array(
                            'fullnm' => $response['fullnm'],
                            'response' => 'true',
                )));
            endif;
        }
    }

    public function index($id = NULL) {
        $valid = $this->session->userdata('login');
        $data['mssg'] = $this->session->flashdata('mssg_url');

        if ($valid == TRUE):
            if ($this->input->post('submit')):
                $url = $this->input->post('short_url');
                $urlMssg = '<div class="alert alert-success" role="alert">'
                        . 'Url Afiliasi' . site_url('rahasia/affiliasi/') . $url . '</div>';

                $this->aff->insert();
                $this->session->set_flashdata('mssg_url', $urlMssg);
            endif;

            $config = $this->setPaging();

            $this->pagination->initialize($config);
            $data['halaman'] = $this->pagination->create_links();

            $param = array(
                'limit' => $config['per_page'],
                'offset' => $id,
            );

            $data['menus'] = $this->menu->gets();
            $data['afiliasiList'] = $this->aff->gets($param);

            $this->load->view($this->urlConfig);
            $this->load->view($this->urlReturn, $data);
            $this->load->view($this->urlFooter);
        else:
            redirect('contributor/login');
        endif;
    }

    private function setPaging() {
        $config = array();
        
        $jml = $this->db->get('affiliate_member');

        //pengaturan pagination
        $config['base_url'] = site_url() . '/afiliasi/index/';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = PAGING_ROW;
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['display_pages'] = TRUE;
                
        return $config;
    }

    public function delete($id) {
        $this->aff->delete($id);
        redirect($this->urlReturn);
    }

}
