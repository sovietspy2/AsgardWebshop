<div class="box-body">
    <p>
        {!! Form::normalInput('name', 'Name', $errors, $wine) !!}
        {!! Form::normalInput('type', 'Type', $errors, $wine) !!}
        {!! Form::normalInput('year', 'Year', $errors, $wine) !!}
        {!! Form::normalInput('identifier', 'Product Identifier', $errors, $wine) !!}
{{--        {!! Form::normalInput('recycle_type', 'Recylce type', $errors, $wine) !!}--}}
        {!! Form::normalInput('price', 'Price', $errors, $wine) !!}
        @mediaSingle('picture', $wine)
    </p>
</div>
