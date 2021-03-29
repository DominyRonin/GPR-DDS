<?php
include(__ROOT__ . "View/View.php");

class ClientView
{

protected $buildingsmodel;
protected $resultsmodel;
protected $clientmodel;
protected $messagemodel;
protected $pillarmodel;

  // public function __construct(/*$controller,$buildingsmodel,$resultsmodel,$clientmodel,$messagemodel,$pillarmodel*/)
  // {
  //   // $this->controller=$controller;
  //   // $this->buildingsmodel=$buildingsmodel;
  //   // $this->resultsmodel=$resultsmodel;
  //   // $this->clientmodel=$clientmodel;
  //   // $this->messagemodel=$messagemodel;
  //   // $this->pillarmodel=$pillarmodel;
  // }

  public function output()
  {
    $str='';
    $str.='<section class="portfolio" id="portfolio">
      <div class="container-fluid">
        <div class="row">

          <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Buildings</h1>
          </div>

          <div align="center">
            <button class="filter-button" data-filter="all">All</button>
            <button class="filter-button" data-filter="category1">Building 1</button>
            <button class="filter-button" data-filter="category2">Building 2</button>
            <button class="filter-button" data-filter="category3">Building 3</button>
          <button class= "btn btn-primary collapsible" style="font-size: 18px;border-radius: 10px;margin-bottom: 6px;" >Add building<span class="glyphicon glyphicon-plus" ></span></button>

          <div class="content">

          <div class="wrapper ">
            <div id="formContent">
              <!-- Tabs Titles -->

              <!-- Icon -->


              <form style="padding:3%" action="###" method="post">
                <div class="form-group">

                <input type="text" class="form-control" id="BuildingName" name="BuildingName" placeholder="Enter Building Name">
</div>
                <div class="form-group">

                <textarea class="form-control" id="BuildingAddress" name="BuildingAddress" placeholder="Enter Building Address"></textarea>
</div>
                <input type="submit" class="btn btn-success" value="Submit">
              </form>


</div>
</div>

            </div>
          </div>

          <br/>

          <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Pillars</h1>
          </div>

          <br/>

          <div style=" margin: 5%;">


                        <!-- <div style="display:none;"><input name="SelectedPillar" value="'/*.$pillar->getID().*/.'"/></div> -->

                <div class="gallery_product col-sm-3 col-xs-6 filter category1">
                  <form action="##" method="post">
                    <a class="fancybox" rel="ligthbox" onclick="$(this).closest("form").submit()">
                    <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=122" />
                        <div style="cursor: pointer;" class="img-info">
                            <h4>Image Title 1</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                      </form>
                  </div>



                <div class="gallery_product col-sm-3 col-xs-6 filter category2">
                  <form action="###" method="post">
                    <a class="fancybox" rel="ligthbox" onclick="$(this).closest("form").submit()">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=526" />
                        <div style="cursor: pointer;" class="img-info">
                            <h4>Image Title 2</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                  </form>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category3">
                     <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=626">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=626" />
                        <div class="img-info">
                            <h4>Image Title 3</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category1">
                    <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=626">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=626" />
                        <div class="img-info">
                            <h4>Image Title 4</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <button type="button" class="btn btn-danger">Delete Pillar</button>
                        </div>
                    </a>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category2">
                    <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=486">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=486" />
                        <div class="img-info">
                            <h4>Image Title 5</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category3">
                    <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=846">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=846" />
                        <div class="img-info">
                            <h4>Image Title 6</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category1">
                    <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=1066">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=1066" />
                        <div class="img-info">
                            <h4>Image Title 7</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category2">
                    <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=506">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=506" />
                        <div class="img-info">
                            <h4>Image Title 8</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category3">
                    <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=1026">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=1026" />
                        <div class="img-info">
                            <h4>Image Title 9</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category1">
                    <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=1077">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=1077" />
                        <div class="img-info">
                            <h4>Image Title 10</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category2">
                    <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=102">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=102" />
                        <div class="img-info">
                            <h4>Image Title 11</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                </div>

                <div class="gallery_product col-sm-3 col-xs-6 filter category3">
                    <a class="fancybox" rel="ligthbox" href="https://picsum.photos/400/250?image=106">
                        <img class="img-responsive" alt="" src="https://picsum.photos/400/250?image=106" />
                        <div class="img-info">
                            <h4>Image Title 12</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <button type="button" class="btn btn-danger">Delete Pillar</button>
                        </div>
                    </a>
                </div>

                <form action="/action_page.php">
<label for="img">Select image:</label>
<input type="file" id="img" name="img" accept="image/*">
<input type="submit">
</form>
        </div>
      </div>
      </div>
    </section>';

    return $str;
  }
}

 ?>
