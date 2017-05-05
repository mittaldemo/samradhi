<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

<body>

<div ng-app="" ng-init="fruits=['mango','apple','orange']">
<input ng-model="name">
<ul>
<li ng-repeat="x in fruits" >
	{{ x }}
</li>	
</ul>


</div>
</body>
</html>
