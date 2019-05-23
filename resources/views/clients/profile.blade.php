@extends('app')

@section('content')

    <div class="col-md-8">
      <div class="card">
        <div class="header">
          <h4 class="title">Mon profile</h4>
        </div>
        <div class="content">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Numéro de téléphone (disabled)</label>
                <input type="text" class="form-control" disabled="" placeholder="Company" value="{{Session::get('phone')}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Clé personnelle</label>
                <input type="text" disabled="" class="form-control" placeholder="Username" value="{{Session::get('authentication_token')}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">adresse emaii</label>
                <input type="email" disabled="" class="form-control" placeholder="Email" value="{{Session::get('email')}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>N° Pièce identité</label>
                <input type="text" disabled="" class="form-control" placeholder="Company" value="{{Session::get('cni')}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Date création</label>
                <input type="text" disabled="" class="form-control" placeholder="Last Name" value="{{Session::get('created_at')}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Status</label>
                <input type="text" disabled="" class="form-control" placeholder="Last Name" value="{{Session::get('status')}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="City" value="Mike">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" placeholder="Country" value="Andrew">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Postal Code</label>
                <input type="number" class="form-control" placeholder="ZIP Code">
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="card">
        <div class="header">
          <h4 class="title">Mon profile (Modifiable)</h4>
        </div>
        <div class="content">
          <form method="post" action="">
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nom</label>
                  <input type="text" class="form-control" placeholder="Company" value="{{Session::get('name')}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Prénom</label>
                  <input type="text" class="form-control" placeholder="Last Name" value="{{Session::get('second_name')}}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>A Propos de moi</label>
                  <textarea rows="5" class="form-control" placeholder="Parlez-nous un peu de vous M./Mme {{Session::get('name')}}" value="Mike"></textarea>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-info btn-fill pull-right">Mettre à joour mon Profile</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      @include('face')
    </div>


@endsection