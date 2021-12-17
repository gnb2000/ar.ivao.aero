

<script src='https://www.google.com/recaptcha/api.js'></script>
<div id="inicio-top-h1-small-blue">Formulario de contacto</div>
<form name="contactform" method="post" action="contacto2.php">
	<table width="450px">
		<tr>
			<td valign="top">
				<label for="first_name">Nombre *</label>
			</td>
			<td valign="top">
				<input  type="text" name="first_name" maxlength="50" size="30">
			</td>
		</tr>
		
		<tr>
			<td valign="top"">
				<label for="last_name">Apellido *</label>
			</td>
			<td valign="top">
				<input  type="text" name="last_name" maxlength="50" size="30">
			</td>
		</tr>
		
		<tr>
			<td valign="top">
				<label for="email">Dirección de email *</label>
			</td>
			<td valign="top">
				<input  type="text" name="email" maxlength="80" size="30">
			</td>
		</tr>
		
		<tr>
			<td valign="top">
				<label for="vid">IVAO VID</label>
			</td>
			<td valign="top">
				<input  type="text" name="vid" maxlength="6" size="30">
		</tr>
		
		<tr>
			<td valign="top">
				<label for="comments">Mensaje *</label>
			</td>
			<td valign="top">
				<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
			</td>
		</tr>
		
		<tr>
			<td valign="top">
			</td>
			<td valign="top">
				<div class="g-recaptcha" data-sitekey="6Lf8kQgTAAAAADNtJR_Nknip3BWPmHGbRwIruvOg"></div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center">
				<input type="submit" value="Submit" class="btn btn-default">   <a href="privacidad.php">Privacidad</a>
			</td>
		</tr>
	</table>
</form>

