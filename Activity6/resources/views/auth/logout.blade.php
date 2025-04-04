<form action="{{ route('logout.post') }}" method="post">
        @csrf
        <h1>LOGOUT PAGE</h1>
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>