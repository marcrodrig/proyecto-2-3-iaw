<div class="card text-center">
    <div class="card-body">
        <img class="img-circle elevation-2"
            src="{{ 'data:image/png;base64, ' . Auth::user()->avatar }}" 
            width="90" height="90" alt="Avatar">
        <h4 class="py-2 text-dark">{{$user->name}}</h4>
        <p>{{$user->username}}</p>
        <hr class="w-100">
        <span><i class="fas fa-envelope"></i></span>
        <p>{{$user -> email}}</p>
    </div>
</div>