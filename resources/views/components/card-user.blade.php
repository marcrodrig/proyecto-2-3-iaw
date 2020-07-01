<div class="card text-center border-0">
    <div class="card-body">
        <img class="card-img img-circle rounded-circle"
            src="{{ asset('storage/' . Auth::user()->avatar) }}" 
            width="100" alt="Avatar">
        <h4 class="py-2 text-dark">{{$user->name}}</h4>
        <p>{{$user->username}}</p>
        <hr class="w-100">
        <span><i class="fas fa-envelope"></i></span>
        <p>{{$user -> email}}</p>
    </div>
</div>