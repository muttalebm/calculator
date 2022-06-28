@extends("layouts.app")

@section('content')
    <div class="main">
        <div class="display">
            <p id="history"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;History</p>
            <h2 id="result"></h2>
        </div>
        <div class="buttons">
            <button id="clear" data-type="action">C</button>
            <button id="delete_single_num" data-type="action"><i class="fa fa-solid fa-eraser"></i></button>
            <button id="Normal_btn" data-type="operation">{{env('CALC_DIV_ICON','/')}}</button>
            <button id="Normal_btn" data-type="operation">{{env('CALC_MULTI_ICON_ICON','*')}}</button>
        </div>
        <div class="buttons">
            <button id="Normal_btn" data-type="operand">7</button>
            <button id="Normal_btn" data-type="operand">8</button>
            <button id="Normal_btn" data-type="operand">9</button>
            <button id="Normal_btn" data-type="operation">{{env('CALC_SUB_ICON','-')}}</button>
        </div>
        <div class="buttons">
            <button id="Normal_btn" data-type="operand">4</button>
            <button id="Normal_btn" data-type="operand">5</button>
            <button id="Normal_btn" data-type="operand">6</button>
            <button id="Normal_btn" data-type="operation">{{env('CALC_ADD_ICON','+')}}</button>
        </div>
        <div class="buttons">
            <button id="Normal_btn" data-type="operand">1</button>
            <button id="Normal_btn" data-type="operand">2</button>
            <button id="Normal_btn" data-type="operand">3</button>
            <button id="Normal_btn" data-type="operand">.</button>
        </div>
        <div class="buttons">
            <button id="Normal_btn" data-type="operand">0</button>
            <button id="Normal_btn" data-type="operand">00</button>
            <button id="equalTo" data-type="action">=</button>
        </div>
    </div>
@endsection
