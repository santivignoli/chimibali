<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function input_text($display='Nombre', $campo='nombre', $type='text', $value='')
{
    echo '<div class="form-group">';
        $attributes = array(
            'class' => 'col-md-2 control-label',
            'style' => ''
        );
        echo form_label($display, $campo, $attributes);
        echo '<div class="col-md-10">';
        $data = array(
            'type'          => $type,
            'name'          => $campo,
            'id'            => $campo,
            'class'         => 'form-control',
            'value'         => set_value($campo),
            'step'          => 'any'
        );
        if($value!="")
        {
            $data['value'] = $value;
        }
        if(form_error($campo))
        {
            $data['class'] = 'form-control parsley-error';
        }
        echo form_input($data);
        echo '<ul class="parsley-errors-list filled"><li class="parsley-required">'.form_error($campo).'</li></ul>';
        echo '</div>';
    echo '</div>';
}

function input_textarea($display='Nombre', $campo='nombre', $value='')
{
    echo '<div class="form-group">';
        $attributes = array(
            'class' => 'col-md-2 control-label',
            'style' => ''
        );
        echo form_label($display, $campo, $attributes);
        echo '<div class="col-md-10">';
        $data = array(
            'name'          => $campo,
            'id'            => $campo,
            'class'         => 'form-control',
            'value'         => set_value($campo)
        );
        if($value!="")
        {
            $data['value'] = $value;
        }
        if(form_error($campo))
        {
            $data['class'] = 'form-control parsley-error';
        }
        echo form_textarea($data);
        echo '<ul class="parsley-errors-list filled"><li class="parsley-required">'.form_error($campo).'</li></ul>';
        echo '</div>';
    echo '</div>';
}

function input_select($display='Nombre', $campo='nombre', $options='', $value='', $id='', $descripcion='')
{
    $array_aux = array();
    if($id != '' && $descripcion != '')
    {
        //Armo el array de opciones
        foreach ($options as $key_option => $option)
        {
            $array_aux[$option[$id]] = $option[$descripcion];
        }
    }
    else
    {
        $array_aux = $options;
    }

    echo '<div class="form-group">';
        $attributes = array(
            'class' => 'col-md-2 control-label',
            'style' => ''
        );
        echo form_label($display, $campo, $attributes);
        echo '<div class="col-md-10">';
        $data = array(
            'name'          => $campo,
            'id'            => $campo,
            'class'         => 'form-control',
            'value'         => set_value($campo),
            'options'       => $array_aux
        );
        if($value!="")
        {
            $data['value'] = $value;
        }
        if(form_error($campo))
        {
            $data['class'] = 'form-control parsley-error';
        }
        echo form_dropdown($data, $array_aux, $value);
        echo '<ul class="parsley-errors-list filled"><li class="parsley-required">'.form_error($campo).'</li></ul>';
        echo '</div>';
    echo '</div>';
}

function input_checkbox($display='Nombre', $campo='nombre', $value='', $checked = FALSE)
{
    /*
    echo '<div class="form-group">';
        $attributes = array(
            'class' => 'col-md-2 control-label',
            'style' => ''
        );
        echo form_label($display, $campo, $attributes);
        echo '<div class="col-md-10 checkbox">';
        $data = array(
            'name'          => $campo,
            'id'            => $campo,
            'value'         => set_value($campo),
            'checked'       => $checked,
            'style'         => ''
        );
        if($value!="")
        {
            $data['value'] = $value;
        }
        if(form_error($campo))
        {
            $data['class'] = 'form-control parsley-error';
        }
        echo form_checkbox($data);
        echo '<ul class="parsley-errors-list filled"><li class="parsley-required">'.form_error($campo).'</li></ul>';
        echo '</div>';
    echo '</div>';
    */
    $checked_aux = "";
    if($checked)
    {
        $checked_aux = "checked";
    }
    echo '<div class="form-group">
            <div class="col-md-12">
                <div class="checkbox">
                    <label>
                        <input name="'.$campo.'" type="checkbox" value="'.$value.'" '.$checked_aux.'>
                        '.$display.'
                    </label>
                </div>
            </div>
        </div>';
    
}