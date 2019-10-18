{!! APFrmErrHelp::showOnlyErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'service_title') !!}"> {!! Form::label('service_title', 'Service Title', ['class' => 'bold']) !!}
        {!! Form::text('service_title', null, array('class'=>'form-control', 'id'=>'service_title', 'placeholder'=>'Service Title')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'service_title') !!} </div>
        <div class="form-group {!! APFrmErrHelp::hasError($errors, 'service_description') !!}"> {!! Form::label('service_description', 'Service description', ['class' => 'bold']) !!}
            {!! Form::text('service_description', null, array('class'=>'form-control', 'id'=>'service_description', 'placeholder'=>'Service description')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'service_description') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'service_price') !!}"> {!! Form::label('service_price', 'Service Price(In USD)', ['class' => 'bold']) !!}
        {!! Form::text('service_price', null, array('class'=>'form-control', 'id'=>'service_price', 'placeholder'=>'Service Price')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'service_price') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'service_num_days') !!}"> {!! Form::label('service_num_days', 'service num days', ['class' => 'bold']) !!}
        {!! Form::text('service_num_days', null, array('class'=>'form-control', 'id'=>'service_num_days', 'placeholder'=>'service num days')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'service_num_days') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'service_num_listings') !!}"> {!! Form::label('service_num_listings', 'service num listings*', ['class' => 'bold']) !!}
        {!! Form::text('service_num_listings', null, array('class'=>'form-control', 'id'=>'service_num_listings', 'placeholder'=>'service num listings')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'service_num_listings') !!} 
        *On how many jobs a job seeker can apply<br />
        **How many jobs an employer can post </div>
    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'service_for') !!}">
        {!! Form::label('service_for', 'service for?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $service_for_1 = 'checked="checked"';
            $service_for_2 = '';
            $service_for_3 = '';
            $service_for_4 = '';
            $service_for_5 = '';
            if (old('service_for', ((isset($services)) ? $services->service_for : 'xpress_resume')) == 'resume_highlighter') {
                $service_for_1 = '';
                $service_for_2 = 'checked="checked"';
                $service_for_3 = '';
                $service_for_4 = '';
                $service_for_5 = '';
            }
            if (old('service_for', ((isset($services)) ? $services->service_for : 'xpress_resume')) == 'resume_writing') {
                $service_for_1 = '';
                $service_for_2 = '';
                $service_for_3 = 'checked="checked"';
                $service_for_4 = '';
                $service_for_5 = '';
            }
            if (old('service_for', ((isset($services)) ? $services->service_for : 'xpress_resume')) == 'info_graphic') {
                $service_for_1 = '';
                $service_for_2 = '';
                $service_for_3 = '';
                $service_for_4 = 'checked="checked"';
                $service_for_5 = '';
            }
            if (old('service_for', ((isset($services)) ? $services->service_for : 'xpress_resume')) == 'special_packages') {
                $service_for_1 = '';
                $service_for_2 = '';
                $service_for_3 = '';
                $service_for_4 = '';
                $service_for_5 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="xpress_resume" name="service_for" type="radio" value="xpress_resume" {{$service_for_1}}>
                Xpress Resume </label>
            <label class="radio-inline">
                <input id="resume_highlighter" name="service_for" type="radio" value="resume_highlighter" {{$service_for_2}}>
                Resume Highlighter </label>
            <label class="radio-inline">
                <input id="resume_writing" name="service_for" type="radio" value="resume_writing" {{$service_for_3}}>
                    Resume Writing </label>
            <label class="radio-inline">
                <input id="info_graphic" name="service_for" type="radio" value="info_graphic" {{$service_for_4}}>
                        Info Graphic </label>
            <label class="radio-inline">
                <input id="special_packages" name="service_for" type="radio" value="special_packages" {{$service_for_5}}>
                            Special Packages </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'service_for') !!}
    </div>
    <div class="form-actions"> {!! Form::button('Update <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!} </div>
</div>