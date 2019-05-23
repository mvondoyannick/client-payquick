<div class="card card-user">
    <div class="image">
        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&amp;fm=jpg&amp;h=300&amp;q=75&amp;w=400"
             alt="...">
    </div>
    <div class="content">
        <div class="author">
            <a href="#">
                <img class="avatar border-gray" src="{{url('assets/img/faces/face-3.jpg')}}" alt="...">

                <h4 class="title">{{Session::get('name')}} {{Session::get('second_name')}}<br>
                    <small>Phone : {{Session::get('phone')}}</small>
                </h4>
            </a>
        </div>
        <p class="description text-center">Empreinte : {{Session::get('authentication_token')}} <br>
            Empreinte : {{Session::get('authentication_token')}} <br>
            Montant du compte : {{Session::get('authentication_token')}}
        </p>
    </div>
    <hr>
    <div class="text-center">
        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

    </div>
</div>