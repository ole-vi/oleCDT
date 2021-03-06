<link rel="stylesheet" href="docsupport/style.css">
<link rel="stylesheet" href="docsupport/prism.css">
<link rel="stylesheet" href="chosen.css">
<style type="text/css" media="all">
/* fix rtl for demo */
.chosen-rtl .chosen-drop { left: -9000px; }
</style>

<select data-placeholder="Select Country" class="chosen-select" multiple style="width:350px;" tabindex="4">
  <option value=""></option>
  <option value="United States">United States</option>
  <option value="United Kingdom">United Kingdom</option>
  <option value="Afghanistan">Afghanistan</option>
  <option value="Aland Islands">Aland Islands</option>
  <option value="Albania">Albania</option>
  <option value="Algeria">Algeria</option>
  <option value="Zimbabwe">Zimbabwe</option>
</select>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var config = {
  '.chosen-select' : {},
  '.chosen-select-deselect' : {allow_single_deselect:true},
  '.chosen-select-no-single' : {disable_search_threshold:10},
  '.chosen-select-no-results' : {no_results_text:'Oops, nothing found!'},
  '.chosen-select-width' : {width:"95%"}
}
for (var selector in config) {
  $(selector).chosen(config[selector]);
}
</script>
