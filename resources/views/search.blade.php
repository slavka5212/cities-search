@extends('main')
@section('content')
<div class="search-box jumbotron p-3 p-md-5 text-white">
    <div class="col-md-12 px-0 text-center">
        <h1 class="display-4">Vyhľadať v databáze obcí</h1>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 lead my-3">
                <input class="search-form-control form-control py-2" type="text" name="city" id="city" placeholder="Zadajte názov"/>
                <div id="city_list"></div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#city').on('keyup',function() {
            var query = $(this).val(); 
            $.ajax({
                
                url:"{{ url('search') }}",
            
                type:"GET",
                
                data:{'city':query},
                
                success:function (data) {
                    
                    $('#city_list').html(data);
                }
            })
            // end of ajax call
        });

        
        $(document).on('click', 'li', function(){
            
            var value = $(this).text();
            $('#city').val(value);
            $('#city_list').html("");
        });
    });
</script>
@endsection
