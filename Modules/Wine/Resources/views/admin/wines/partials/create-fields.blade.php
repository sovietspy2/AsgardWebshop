<div class="box-body">
    <p>
        {!! Form::normalInput('name', 'Name', $errors) !!}
        {!! Form::normalInput('type', 'Type', $errors) !!}
        {!! Form::normalInput('year', 'Year', $errors) !!}
        {!! Form::normalInput('identifier', 'Product Identifier', $errors) !!}
        {{--{!! Form::normalInput('recycle_type', 'Recylce type', $errors) !!}--}}
        {!! Form::normalInput('price', 'Price', $errors) !!}
        @mediaSingle('picture')
    </p>
</div>
