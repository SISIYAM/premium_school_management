@extends('layouts.common')
@section('page-content')
    <style>
        /* Custom Scrollbar Styles */
        .dt-responsive {
            margin-top: 20px;
            /* Add margin between the card and the scrollbar */
        }

        .dt-responsive::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .dt-responsive::-webkit-scrollbar-thumb {
            background-color: #007bff;
            /* Primary color for scrollbar thumb */
            border-radius: 10px;
        }

        .dt-responsive::-webkit-scrollbar-thumb:hover {
            background-color: #0056b3;
            /* Darker shade on hover */
        }

        .dt-responsive::-webkit-scrollbar-track {
            background-color: #f1f1f1;
            /* Light background for scrollbar track */
            border-radius: 10px;
        }
    </style>
    @yield('filter-section')
    @yield('modal-content')
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">

                @yield('card-header')

            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive" style="overflow-x: auto;">
                    <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                @foreach ($thead as $th)
                                    <th>{{ $th }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @yield('table-row')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
