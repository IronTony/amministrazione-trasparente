<?php
$get_at_option_showarchivedesc = get_option('at_option_showarchivedesc'); ?>

<?php if ($get_at_option_showarchivedesc == '0') {?>
<style type="text/css">
.row {vertical-align: top; height:auto !important;}
.list {display:none;}
.showArchive {display:none;} /* Fixed Bootstrap conflict CSS */
.hideArchive:target + .showArchive {display:inline;} /* Fixed Bootstrap conflict CSS */
.hideArchive:target {display:none;} /* Fixed Bootstrap conflict CSS */
.hideArchive:target ~ .list {display:inline;} /* Fixed Bootstrap conflict CSS */
@media print {.hideArchive, .showArchive {display:none;}} /* Fixed Bootstrap conflict CSS */
</style>
<?php } ?>

<div class="row" style="font-size:0.8em;text-align:center;">

<?php if ($get_at_option_showarchivedesc == '0') {?>
<a href="#hideARCHIVE" class="hideArchive" id="hideARCHIVE">[+] Info Normativa</a><a href="#showARCHIVE" class="showArchive" id="showARCHIVE">[-] Info Normativa</a> &bull; <?php } ?>

<a href="<?php echo get_permalink(get_option('at_option_id')); ?>" title="Torna al sommario">Torna al sommario</a>

<div class="list" style="text-align:left;">
<?php echo term_description( $term->id, 'tipologie' ) ?>
<hr/>
</div>

</div>
