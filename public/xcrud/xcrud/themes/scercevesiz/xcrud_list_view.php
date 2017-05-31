

<?php if ($this->is_create or $this->is_csv or $this->is_print){?>
    <div class="xcrud-top-actions">
        <div class="btn-group pull-right">
            <?php echo $this->print_button('btn btn-default','glyphicon glyphicon-print');
            echo $this->csv_button('btn btn-default','glyphicon glyphicon-file'); ?>
        </div>
        <?php echo $this->add_button('btn btn-success','glyphicon glyphicon-plus-sign'); ?>
        <div class="clearfix"></div>
    </div>
<?php } ?>
<div class="xcrud-list-container">
    <table class="xcrud-list table table-striped table-hover table-bordered">
        <thead>
            <?php echo $this->render_grid_head('tr', 'th'); ?>
        </thead>
        <tbody>
            <?php echo $this->render_grid_body('tr', 'td'); ?>
        </tbody>
        <tfoot>
            <?php echo $this->render_grid_footer('tr', 'td'); ?>
        </tfoot>
    </table>
</div>
<div class="xcrud-nav">
    <?php echo $this->render_limitlist(true); ?>
    <?php echo $this->render_pagination(); ?>
    <?php echo $this->render_search(); ?>
    <?php echo $this->render_benchmark(); ?>
</div>


