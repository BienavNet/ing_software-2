<?php

    class Tienda extends Controller{

        private static $VIEW_NAME = 'tienda/index';
        private static $MODEL_NAME = 'product';
        private static $ITEMS_PER_PAGE = 4;

        function __construct()
        {
            parent::__construct(Tienda::$VIEW_NAME, Tienda::$MODEL_NAME);
        }



        private function setPagination($current_page)
        {
            $this->loadModel();

            $pages_number = ceil(count($this->model->getAll())/Tienda::$ITEMS_PER_PAGE);
            
            if($current_page>1 && $current_page<$pages_number)
            {
                $this->vista->data+=['before'=>$current_page-1];
                $this->vista->data+=['after'=>$current_page+1];
            }else if($current_page == 1 && $pages_number==1)
            {
                $this->vista->data+=['before'=>1];
                $this->vista->data+=['after'=>1];
                
            }else if($current_page == 1 && $pages_number>$current_page)
            {
                $this->vista->data+=['before'=>$current_page];
                $this->vista->data+=['after'=>$current_page+1];
                
            }else if($current_page==$pages_number && $current_page!=1)
            {
                $this->vista->data+=['before'=>$current_page-1];
                $this->vista->data+=['after'=>$current_page];
            }

            return $pages_number;


        }

        public function getProducts()
        {
            $this->loadModel();
            $formated_products = [];
            $str_replaces = ['%img', '%name', '%description', '%price'];
            $html = 
            '<div class="col-lg-3 shop-info-grid text-center mt-4" style="height:42rem;">
                <div class="product-shoe-info shoe h-100" >
                    <div class="men-thumb-item m-3 d-flex flex-wrap justify-content-center align-items-center" style="height:40%">
                        <img src="'.constant('URL').'%img" class="img-fluid" width="130px" height="70px" alt="">

                    </div>

                    <div class="p-3 item-info-product d-flex flex-wrap justify-content-center align-items-center" style="height:50%">
                        <h4 class="d-block align-self-center">
                            <a href="#">%name</a>
                        </h4>

                        <div class="row" style=" font-size:0.9rem;">
                            <p><b>Descripción: </b>%description</p>
                        </div>


                        <div class="product_price d-flex flex-wrap justify-content-center align-items-center">
                            <div class="grid-price">
                                <span class="money"><span><b>Precio: </b>$%price</span>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row d-flex justify-content-center align-item-center" style="height: 4%;">
                        <button class="btn btn-success">Comprar</button>
                    </div>
                </div>
            </div>';
            
            $current_page = $_GET['page'];
            
            $pages = $this->setPagination($current_page);
            $this->vista->data+=['pagination'=>$pages];
            
            


            

            if(!empty($current_page) || $current_page!=null)
            {
                $items = $this->model->getByRange($current_page, Tienda::$ITEMS_PER_PAGE);


                foreach($items as $item)
                {
                    $aux = $html;
                    $img = $this->getProductImage(array_shift($item));

                    $values = $item;

                    array_unshift($values, $img);

                    $aux = str_replace($str_replaces, $values, $aux);
                    array_push($formated_products, $aux);

                }

                $this->vista->data+=['products'=>$formated_products];

            }


        }


        private function getProductImage($id)
        {
            $ext = ['jpg', 'png', 'jpeg'];
            $base_path = 'plugins/img/uploads';

            for ($i=0; $i < count($ext); $i++) { 
                if(file_exists("$base_path/$id.".$ext[$i]))return "$base_path/$id.".$ext[$i];
            }

            return "none";
        }






    }



?>