@extends('main')
@section('content')
<div id="city-detail">
    <div class="container">
    @if ($city)
        <div class="text-center p-2">
            <h1 class="display-4">Detail obce</h1>
        </div>
        <div  id="city-detail" class="row mb-2">
            <div class="col-md-12">  
                <div class="card flex-md-row mb-4 box-shadow">
                    <div class="col-md-6 order-2 order-md-1 p-0">        
                        <div class="card-body d-flex flex-column align-items-start h-100 w-100">
                        <table class="table table-sm table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row" class="font-weight-bold">Meno starostu:</th>
                                <td>{{ $city->mayor }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="font-weight-bold">Telefón:</th>
                                <td colspan="2">{{ $city->tel }}</td>
                            </tr>
                            @if ($city->fax)
                            <tr>
                                <th scope="row" class="font-weight-bold">Fax:</th>
                                <td colspan="2">{{ $city->fax }}</td>
                            </tr>
                            @endif
                            @if ($city->email)
                            <tr>
                                <th scope="row" class="font-weight-bold">Email:</th>
                                <td colspan="2">{{ $city->email }}</td>
                            </tr>
                            @endif
                            @if ($city->web)
                            <tr>
                                <th scope="row" class="font-weight-bold">Web:</th>
                                <td colspan="2">{{ $city->web }}</td>
                            </tr>
                            @endif
                            @if ($city->lng && $city->lat)
                            <tr>
                                <th scope="row" class="font-weight-bold">Zemepisné súradnice:</th>
                                <td colspan="2">{{ $city->lat }}, {{ $city->lng }}</td>
                            </tr>
                            @endif
                        </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 order-md-2 p-0">
                        <div class="text-center align-middle my-auto">
                            <img class="card-img-right flex-auto p-2" src="{{ $city->img }}" alt="coat of arms of the city">
                            <h2 class="city-name display-4">{{ $city->name }}</h2>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    @else
     City page does not exist
    @endif
    </div>
</div>
@endsection