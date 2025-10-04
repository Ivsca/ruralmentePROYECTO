@if(\Session::get('succeess'))
    <div class="w-full text-lg text-center text-white bg-teal-800 rounded-md bg-opacity-70">
        <p>{{\Session::get("success")}}</p>
    </div>
@endif