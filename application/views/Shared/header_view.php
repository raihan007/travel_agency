<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<style type="text/css">
	.block {
	  text-align: center;
	  background: #c0c0c0;
	  border: #a0a0a0 solid 1px;
	  margin: 20px;
	}
	 
	.block:before {
	  content: '\200B';
	/*   content: '';
	  margin-left: -0.25em; */
	  display: inline-block;
	  height: 100%; 
	  vertical-align: middle;
	 }
	 
	.centered {
	  display: inline-block;
	  vertical-align: middle;
	  width: 300px;
	  padding: 10px 15px;
	  border: #a0a0a0 solid 1px;
	  background: #f5f5f5;
	 }
	</style>
</head>
<body>