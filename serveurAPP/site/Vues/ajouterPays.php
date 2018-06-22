<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css" type="text/css">
<body>
<div class="centrePage">
<div class="w3-container w3-blue">
  <h2>Ajout d'un Pays</h2>
</div>

<BR><BR><BR>
<FORM action = 'index.php?vue=pays&action=enregistrer' method = 'post'>
	<TABLE>
		<TR>
			<TD>
				Libelle du pays
			</TD>
			<TD colspan = '2' align=left>
				<INPUT type = 'text' name = 'nomPays'/>
			</TD>
		</TR>
		<TR>
			<TD>
				Nom de la photo
			</TD>
			<TD>
				<INPUT type = 'text' name = 'photoPays'/>
			</TD>
			<TD><I>
				donner le nom avec extension
			</I></TD>
		</TR>
		<TR>
			<TD >
				La langue 
			</TD>
			<TD colspan = '2' align=left>
				<?php
				echo $_SESSION['lesLangues'];
				?>
			</TD>
		</TR>
		<TR>
			<TD colspan = '3' align = 'right'>
				<INPUT type = 'submit' value = 'Valider' name = 'choix'/>
			</TD>
		<TR>
	</TABLE>
</FORM>
</div>
		