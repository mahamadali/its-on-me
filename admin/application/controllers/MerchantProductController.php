<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MerchantProductController extends CI_Controller {

	public $data; 

	public function __construct(){
        parent::__construct();
        $this->data['header'] = $this->load->view('merchant_header',$this->data,true);
        $this->data['footer'] = $this->load->view('footer',$this->data,true);
        $this->load->model('Merchant_Product_model', 'merchant_product');
        $this->load->helper('form');
        $this->load->helper('general');
    }

    public function index()
    {      
       if(!$this->session->userdata('merchant'))
       {
           redirect('merchant/login');
       }

       $this->data['page'] = "products/index";
       $this->data['AllProducts'] = $this->merchant_product->get_all_data();
       $this->load->view('structure',$this->data);	 

   }

   public  function add_product_items()
   {
    $this->data['categories'] = categories();
    $this->data['page'] = "products/add";
    $this->load->view('structure',$this->data);  
}

public function store_product_items()
{

  $MerchantProductdata['created_at'] = date('Y-m-d H:i:s');
  $MerchantProductdata['merchant_id'] = $_SESSION['merchant'];
  $MerchantProductdata['product_name'] = $this->input->post('product_name');
  $MerchantProductdata['product_price'] = $this->input->post('product_price');
  $MerchantProductdata['product_description'] = $this->input->post('product_description');
  $MerchantProductdata['categories'] = implode(',',$this->input->post('categories'));

  $product_id = $this->merchant_product->insert_data_getid($MerchantProductdata,'products');

  if (!empty($product_id)) {
      $this->session->set_flashdata('success', 'Product Added successfully!');

  }else{
    $this->session->set_flashdata('error', 'Something Wrong!');

}   
redirect('merchant/products');
}

    public function delete_product_item($id)
    {

      $item_id = $this->merchant_product->delete_data('products','id',$id);
      

      if(!empty($item_id)) {
        $this->session->set_flashdata('success', 'Product Item deleted successfully!');

    }else{
        $this->session->set_flashdata('error', 'Something Wrong!');
    }
    redirect('merchant/products');
    }


    public function edit_product_item($id)
{
    $this->data['categories'] = categories();
    $this->data['product_data'] = $this->merchant_product->get_product_item_data($id);
    $this->data['page'] = "products/edit";
    $this->load->view('structure',$this->data);  
}

 public function update_product_item()
 {

    $product_id = $this->input->post('product_id');    
    $productData['updated_at'] = date('Y-m-d H:i:s');
    $productData['product_name'] = $this->input->post('product_name');
    $productData['product_price'] = $this->input->post('product_price');
    $productData['product_description'] = $this->input->post('product_description');
    $productData['categories'] = implode(',',$this->input->post('categories'));
   
    unset($productData['product_id']);

   

    $edit_pro_id = $this->merchant_product->update_product_detail($product_id,$productData);

    if (!empty($edit_pro_id)) {
        $this->session->set_flashdata('success', 'Product Data updated successfully!');
     
    }else{
    $this->session->set_flashdata('error', 'Something Wrong!');

}  
    redirect('merchant/products');

 }

}