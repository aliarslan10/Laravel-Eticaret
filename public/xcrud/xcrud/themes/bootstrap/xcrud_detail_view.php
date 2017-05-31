

<div class="xcrud-view" style="padding: 10px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $this->render_table_name($mode,''); ?></h3>
            <?php
                if(Xcrud_config::$can_minimize)
                {
                        echo '<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>';
                }
            ?>
        </div>
        <div class="panel-body">
            <?php echo $mode == 'view' ? $this->render_fields_list($mode,array('tag'=>'table','class'=>'table')) : $this->render_fields_list($mode,'div','div','label','div'); ?>

            <div class="xcrud-nav">
                <?php echo $this->render_benchmark(); ?>
            </div>
            <div class="xcrud-top-actions btn-group">
                <?php 
                echo $this->render_button('save_return','save','list','btn btn-danger','','create,edit');
                echo $this->render_button('save_new','save','create','btn btn-primary','','create,edit');
                echo $this->render_button('save_edit','save','edit','btn btn-info','','create,edit');
                echo $this->render_button('return','list','','btn btn-warning'); ?>
            </div>  
        </div>
    </div>
</div>
