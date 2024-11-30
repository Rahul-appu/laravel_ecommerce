@extends('auth.layouts')

@section('content')
<div class="card card-primary">
    <!-- Card Header with Title and Tools -->
    <div class="card-header">
        <h3 class="card-title">DashBoard</h3>
       
    </div>

    <!-- Card Body with Chart -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
            <div class="inner">
            <h3>150</h3>
            <p>New Orders</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
            <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
            <p>Bounce Rate</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-warning">
            <div class="inner">
            <h3>44</h3>
            <p>User Registrations</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-danger">
            <div class="inner">
            <h3>65</h3>
            <p>Unique Visitors</p>
            </div>
            <div class="icon">
            <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            
            </div>


            <div class="row">
                <section class="col-lg-5 connectedSortable ui-sortable">

                    <div class="card bg-gradient-primary">
                    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Visitors
                    </h3>
                    
                    <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-plus" onclick="show()"></i>
                    </button>
                    </div>
                    
                    </div>
                    <div class="card-body" id="cardss">
                    </div>
                    
                    
                    </div>
                    
                    </div>
                    </div>
                    
                    
                    <!-- Div to show user data -->
<div id="user-info">
    <p id="user-name"></p>
    <p id="user-email"></p>
    <p id="user-mobile"></p>
</div>
                   
                    
                    </section>
                      
                

            </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function show() {
            var card = document.querySelector('[data-card-widget="collapse"]').closest('.card');
            var icon = document.getElementById('toggle-icon');
            
            // Trigger collapse or expand behavior
            if (card.classList.contains('collapsed-card')) {
                card.classList.remove('collapsed-card');
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            } else {
                card.classList.add('collapsed-card');
                icon.classList.remove('fa-minus');
                icon.classList.add('fa-plus');
            }
        }

        // Initialize user data if available
        var userData = @json(session()->get('user_data'));

        if (userData) {
            console.log('User Data:', userData); // Debugging line

            // Display user data
            var userInfoDiv = document.getElementById('user-info');
            var userNameDiv = document.getElementById('user-name');
            var userEmailDiv = document.getElementById('user-email');
            var userMobileDiv = document.getElementById('user-mobile');
            
            if (userInfoDiv && userNameDiv && userEmailDiv && userMobileDiv) {
                userInfoDiv.style.display = 'block';
                userNameDiv.textContent = 'Welcome, ' + userData.name + '!';
                userEmailDiv.textContent = 'Your email: ' + userData.email;
                userMobileDiv.textContent = 'Your mobile number: ' + userData.mobile_number;
            } else {
                console.error('One or more elements are missing.');
            }
        }
    });
</script>


@endsection
