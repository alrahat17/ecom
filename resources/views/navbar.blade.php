

<div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                 <?php
                                    $data=DB::table('tbl_category')
                                                ->where('activation_status',1)
                                                ->get();
                                   
                                foreach($data as $row)
                                   {
                                    ?>

                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#{{ $row->category_name }}">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            {{$row->category_name}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$row->category_name}}" class="panel-collapse collapse">
                                    
                                    <div class="panel-body">
                                        
                                    <?php
                                    $data=DB::table('tbl_item')
                                                ->where('activation_status',1)
                                                ->where('category_id',$row->category_id)
                                                ->get();
                                foreach($data as $row)
                                   {
                                    ?>
                                        <ul>
                                            <li><a href="{{ URL::to('/product_by_item/'.$row->item_id) }}">{{$row->item_name}}</a></li>
                                            
                                        </ul>
                                    <?php 
                            }
                            ?>
                                    </div>
                                   
                                </div>
                                <?php 
                            }
                            ?>
                            </div>

                            
                            
                           
                            
                            
                        
                        </div>
                        <!--/category-products-->





                    
                        <div class="left-sidebar">
                        <h2>Brand</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->  
                            <div class="panel panel-default">
                                <?php
                                    $data=DB::table('tbl_brand')
                                                ->where('activation_status',1)
                                                ->get();
                                foreach($data as $row)
                                   {
                                    ?>
                                   

                                
                                <div class="panel-heading">
                               
                                    <h4 class="panel-title"><a href="{{ URL::to('/product_by_brand/'.$row->brand_id) }}">{{$row->brand_name}}</a></h4>
                                </div>
                            
                            <?php 
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                            
                            
                            
                            
                        
                        
                    
                        
                        
                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{URL::to('ecom_front/images/home/shipping.jpg')}}" alt="" />
                        </div><!--/shipping-->

                        
                    
                    </div>
                </div>
