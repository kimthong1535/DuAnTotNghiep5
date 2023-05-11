 @extends('backend.master_layout')
@section('title', 'Dashboard')
@section('content')
<div class="row">

  <div class="col-xl-3 col-sm-6">
      <div class="card-box widget-box-two widget-two-custom">
          <div class="media">
              <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                  <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
              </div>

              <div class="wigdet-two-content media-body">
                  <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Product</p>
                  <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{$product_count}}</span></h3>
              </div>
          </div>
      </div>
  </div>
  <!-- end col -->

  <div class="col-xl-3 col-sm-6">
      <div class="card-box widget-box-two widget-two-custom ">
          <div class="media">
              <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                  <i class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
              </div>
              <div class="wigdet-two-content media-body">
                  <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Order</p>
                  <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{$order_count}}</span></h3>
              </div>
          </div>
      </div>
  </div>
  <!-- end col -->
  
  <div class="col-xl-3 col-sm-6">
      <div class="card-box widget-box-two widget-two-custom ">
          <div class="media">
              <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                  <i class="mdi mdi-crown avatar-title font-30 text-white"></i>
              </div>

              <div class="wigdet-two-content media-body">
                  <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Customer</p>
                  <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{$User_count}}</span></h3>
              </div>
          </div>
      </div>
  </div>
  <!-- end col -->

  <div class="col-xl-3 col-sm-6">
      <div class="card-box widget-box-two widget-two-custom ">
          <div class="media">
              <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                  <i class="mdi mdi-auto-fix  avatar-title font-30 text-white"></i>
              </div>

              <div class="wigdet-two-content media-body">
                  <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Posts</p>
                  <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{$post_count}}</span></h3>
              </div>
          </div>
      </div>
  </div>

</div>
<!-- end row -->   
<!-- Biểu Đồ -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Site Analysis</h4>
                      <h5 class="card-subtitle">Overview of Latest Month</h5>
                    </div>
                  </div>
                  <div class="row">
                    <!-- column -->
                    <div class="col-lg-9">
                    <canvas id="myChart" height="80px"></canvas>

<script>
    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 15;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Product', 'Posts', 'Order', 'Customer'],
        datasets:[{
          label:'Population',
          data:[
            {{$product_count}},
            {{$post_count}},
            {{$order_count}},
            {{$User_count}}
            
            
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Largest Cities In Massachusetts',
          fontSize:10
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
                    </div>
                    <div class="col-lg-3">
                      <div class="row">
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center"  style="background-color: #64c5b1">
                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1" >{{$User_count}}</h5>
                            <small class="font-light">Total Users</small>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-plus fs-3 font-16"></i>
                            <h5 class="mb-0 mt-1">{{$User_count}}</h5>
                            <small class="font-light">New Users</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-cart fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">{{$product_count}}</h5>
                            <small class="font-light">Total Shop</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-tag fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">{{$order_count}}</h5>
                            <small class="font-light">Total Orders</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">{{$order_count}}</h5>
                            <small class="font-light">Pending Orders</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-web fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">{{$order_count}}</h5>
                            <small class="font-light">Online Orders</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- column -->
                  </div>
                </div>
              </div>
            </div>
          </div>
 <!--- end row -->
 
<!-- Đơn Hàng Mới -->

<!--- end row -->
@endsection


