
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/calendar.css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<?php
// Generate calendar
echo $this->calendar->generate($year, $month);
?>
