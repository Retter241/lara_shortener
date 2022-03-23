<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

     <link rel="stylesheet" href={{ asset('css/app.css') }}>
    </head>
   <body style="text-align: center;">

 <div class="container">
        <div class="row">
               <div name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Larave links shortener') }}
        </h2>
    </div>
 
    <div class="col-md-12-12">
         {!! Form::open(['url' => '/links', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
               @csrf
                
               <input type="text" name="link"> <br>
               <button type="submit">Save</button>
     {!! Form::close() !!}
    </div>
        </div>
    </div>
   


    <div class="container">
        <div class="row">
            <div class="flex flex-col mt-6">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 bg-white sm:rounded-lg" style="margin-top: 25px;">
        @if($links->count())
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Original URL
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Short version
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Views
                </th>
                <th class="px-6 py-3 bg-gray-50">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($links as $link)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ substr($link->original, 0, 50) }}@if(strlen($link->original) > 50)...@endif
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <a href="{{URL::to('/'.$link->shortened )}}" target="__blank" class="px-2 inline-flex leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  {{URL::to('/'.$link->shortened )}}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ number_format($link->views) }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                             {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/links', $link->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Page',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                            
                        </td>
                    </tr>
                @endforeach


            </tbody>
            </table>
             <div class="d-flex justify-content-center">
                   {!! $links->links() !!}
             </div>
           
            </div>
        @else
            <p class="text-center p-4">No links found..</p>
        @endif
      </div>
    </div>
  </div>
</div>
        </div>
    </div>


<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
