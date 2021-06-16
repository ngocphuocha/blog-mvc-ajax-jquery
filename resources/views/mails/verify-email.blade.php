<h1>Hi {{$email}}!</h1>
{{-- <p>Click to the link to verify your email: <a href="{{$linkVerify}}">Click here</a></p> --}}
<form action="{{ $linkVerify }}" method="post">
    @csrf
    @method('PUT')
    <input type="submit" class="bg-blue-300 " value="Verify now">
</form>