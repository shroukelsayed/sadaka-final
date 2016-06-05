@extends('layout')
@section('header')
<div class="page-header">
        <h1>Medicines / Show #{{$medicine->id}}</h1>
        <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('medicines.edit', $medicine->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$medicine->person->personInfo->id}}</p>
                </div>
                <div class="form-group">
                     <label for="name">Case NAME</label>
                     <p class="form-control-static">{{$medicine->person->personInfo->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="address">Case ADDRESS</label>
                     <p class="form-control-static">{{$medicine->person->personInfo->address}}</p>
                </div>
                    <div class="form-group">
                     <label for="birthdate">Case BIRTHDATE</label>
                     <p class="form-control-static">{{$medicine->person->personInfo->birthdate}}</p>
                </div>
                    <div class="form-group">
                     <label for="gender">Case GENDER</label>
                     <p class="form-control-static">{{$medicine->person->personInfo->gender}}</p>
                </div>
                    <div class="form-group">
                     <label for="maritalstatus">Case MARITALSTATUS</label>
                     <p class="form-control-static">{{$medicine->person->personInfo->maritalstatus}}</p>
                </div>
                    <div class="form-group">
                     <label for="phone">Case PHONE</label>
                     <p class="form-control-static">{{$medicine->person->personInfo->phone}}</p>
                </div>
                     <div class="form-group">
                     <label for="Donation Type">Donation Type</label>
                     <p class="form-control-static">
                        {{$medicine->person->donationType->type}}
                     </p>
                
                </div>
                     <div class="form-group">
                     <label for="Donation Type">Case Interval</label>
                     <p class="form-control-static">
                        {{$medicine->person->intervalType->type}}
                     </p>
                </div> 
                 <div class="form-group">
                     <label for="name">Medicine NAME</label>
                     <p class="form-control-static">{{$medicine->name}}</p>
                </div>
                     <div class="form-group">
                     <label for="Amount">Quantity</label>
                         <p class="form-control-static">
                            {{$medicine->amount}} Packets</p>
                </div> 
               
                  
                <div class="form-group">
                    
                      <label for="case_doc_field">Case Documents</label>
                      <br>
                      @foreach($medicine->person->personDocs as $doc)

                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/medicine/$doc->document") }}" alt="$doc->document" />
                        <br><br>
                        <label for="case_doc_field">Update Case Documents</label>
                        <input type="file" id="case_doc_field" name="case_doc"  value="{{ old("case_doc") }}"/>
                         @if($errors->has("case_doc"))
                          <span class="help-block">{{ $errors->first("case_doc") }}</span>
                         @endif
                      @endforeach
                    </div>  
            </form>

            <a class="btn btn-link" href="{{ route('person_infos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection