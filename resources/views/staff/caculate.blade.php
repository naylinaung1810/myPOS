@extends('layout.master')

@section('title')
@stop

@section('content')

    <main>
        <div class="row">
            <span>
            <i class="material-icons" style="margin-top: 10px;">storage</i>
            </span>
            <span style="margin-left: 10px;font-size: 30px">Dashboard </span><small>> Sale</small>
        </div>
        <div class="divider" style="margin-top: 20px;"></div>
        <section class="" style="margin-top: 20px;margin-right: 10px">
            <div class="row">
                <div class="col m6 offset-m3 s12">
                    <div class="card-panel">
                       <form>
                           <div class="input-field col s12">
                               <input placeholder="Grand Total" id="total" value="{{$total}}" type="number" class="validate">
                               <label for="total">Grand Total</label>
                           </div>
                           <div class="input-field col s12">
                               <input id="amount" type="number" class="validate" autofocus>
                               <label for="amount">Give Amount</label>
                           </div>
                           <button type="submit" class="btn btn-block waves-effect">Calculate</button>
                       </form>
                        <div class="input-field col s12">
                            <input placeholder="Result" id="result" type="number" class="validate">
                            <label for="result">Result</label>
                        </div>
                        <a href="{{route('vouncher.get',['voc_no'=>$voc_no])}}" class="waves-effect waves-light btn"><i class="material-icons right">exit_to_app</i>Print</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @stop

@section('script')
    <script>
        $(document).ready(function() {
            M.updateTextFields();


            $('form').submit(function (e) {
                e.preventDefault();
                var total=$('#total').val();
                var amount=$('#amount').val();
                var res=amount-total;
                $('#result').val(res);
            })
        });
    </script>
    @stop