<html>

<title>IP address generator</title>

<body>

Use this to generate a list of all IP's in a given range.
<br>

<form action="gen.php" method="post" enctype="multipart/form-data">

<table>
<tr>
<th>
Subnet:
</th>
<th colspan="2">
Start:
</th>
<th colspan="2">
End:
</th>
</tr><tr>
<td>
<input type="text" name="lead" size="10" value="192.168">
</td><td>
<input type="text" name="a" size="3" value="0">
</td><td>
<input type="text" name="b" size="3" value="0">
~
</td><td>
<input type="text" name="c" size="3" value="255">
</td><td>
<input type="text" name="d" size="3" value="254">
</td>
</tr>
</table>

<p>

<input type="submit" value="Generate">

</form>

</body>

</html>
