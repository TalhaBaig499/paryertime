@section('content')
    

    <h1>Namaz Timings for Lahore, Pakistan</h1>
    {{-- @if ($form->has('submit')) --}}

    <form action="{{ route('namaz.time') }}" method="POST">
        @csrf
        <select name="city" id="">
            <option value="lahore">lahore</option>
            <option value="faisalabad">lahore</option>
            <option value="karachi">lahore</option>
        </select>
        <select name="country" id="">
            <option value="pk">pk</option>
            <option value="uk">uk</option>
            <option value="usa">usa</option>
        </select>
        <button type="submit" name="submit">submmit kro</button>
    </form>
  
    
    <script>
        // async function  fetchText() {
        //     let url = 'https://ipinfo.io/json?token=3800';
        //     let response = await fetch(url);
        //     let data = await response.json();
        //     console.log(data);
        // }
        // fetchText();

    </script>
@endsection
