@extends('main')
@section('content')

<div id="city-detail">
    <div class="container">
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
                                <td>Mark</td>
                            </tr>
                            <tr>
                                <th scope="row" class="font-weight-bold">Adresa obecného úradu:</th>
                                <td>Jacob</td>
                            </tr>
                            <tr>
                                <th scope="row" class="font-weight-bold">Telefón:</th>
                                <td colspan="2">56789</td>
                            </tr>
                            <tr>
                                <th scope="row" class="font-weight-bold">Fax:</th>
                                <td colspan="2">34567</td>
                            </tr>
                            <tr>
                                <th scope="row" class="font-weight-bold">Email:</th>
                                <td colspan="2">Larry the Bird</td>
                            </tr>
                            <tr>
                                <th scope="row" class="font-weight-bold">Web:</th>
                                <td colspan="2">Larry the Bird</td>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 order-md-2 p-0">
                        <div class="text-center align-middle my-auto">
                            <img class="card-img-right flex-auto p-2" src="https://www.e-obce.sk/erb/1.gif" alt="coat of arms of the city">
                            <h2 class="city-name display-4">Názov obce</h2>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>
@endsection