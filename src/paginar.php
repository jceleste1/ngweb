<?php

	$prox = $pag + 1;
	$ant = $pag - 1;
	$ultima_pag = ceil($conta_linhas / $exibe);
	$penultima = $ultima_pag - 1;
	$adjacentes = 2;


	$morePar .= "&typeAnManual=".$_REQUEST[typeAnManual]."&sector=".$_REQUEST["sector"]."&typecompany=".$_REQUEST['typecompany'];
	$morePar .= "&billing=".$_REQUEST['billing']."&zone=".$_REQUEST['zone'];
	$morePar .= "&sector=".$_REQUEST["sector"]."&listBlock=".$_REQUEST["listBlock"]."&txtSearch=".urlencode($_REQUEST["txtSearch"]);

	$s = "";
	if ($pag>1)
	{
		$paginacao = '<a href='.$http.'?action='.$action.'&pag='.$ant.$morePar.'>anterior</a>';
		$s = "s";
	}

	echo '<div class="paginacao">';

	if($conta_linhas>0)
		echo 'Pag'.$s.': ';




if ($ultima_pag <= 5)
{
	for ($i=1; $i< $ultima_pag+1; $i++)
	{
		if ($i == $pag)
		{
			$paginacao .= '<a class="atual" href='.$http.'?action='.$action.'&pag='.$i.$morePar.'>'.$i.'</a>';
		} else {
			$paginacao .= '<a href='.$http.'?action='.$action.'&pag='.$i.$morePar.'>'.$i.'</a>';
		}
	}
}

if ($ultima_pag > 5)
{
	if ($pag < 1 + (2 * $adjacentes))
	{
		for ($i=1; $i< 2 + (2 * $adjacentes); $i++)
		{
			if ($i == $pag)
			{

				$paginacao .= '<a class="atual" href='.$http.'?action='.$action.'&pag='.$i.$morePar.'>'.$i.'</a>';
			} else {
				$paginacao .= '<a href='.$http.'?action='.$action.'&pag='.$i.$morePar.'>'.$i.'</a>';
			}
		}
		$paginacao .= '...';
		$paginacao .= '<a href='.$http.'?action='.$action.'&pag='.$penultima.$morePar.'>'.$penultima.'</a>';
		$paginacao .= '<a href='.$http.'?action='.$action.'&pag='.$ultima_pag.$morePar.'>'.$ultima_pag.'</a>';
	}
	elseif($pag > (2 * $adjacentes) && $pag < $ultima_pag - 3)
	{
		$paginacao .= '<a href='.$http.'?action='.$action.'&pag=1'.$morePar.'>1</a>';
		$paginacao .= '<a href='.$http.'?action='.$action.'&pag=1'.$morePar.'>2</a> ... ';
		for ($i = $pag-$adjacentes; $i<= $pag + $adjacentes; $i++)
		{
			if ($i == $pag)
			{
				$paginacao .= '<a class="atual" href='.$http.'?action='.$action.'&pag='.$i.$morePar.'>'.$i.'</a>';
			} else {
				$paginacao .= '<a href='.$http.'?action='.$action.'&pag='.$i.$morePar.'>'.$i.' </a>';
			}
		}
		$paginacao .= '...';
		$paginacao .= '<a href='.$http.'?action='.$action.'&pag='.$penultima.$morePar.'>'.$penultima.'</a>';
		$paginacao .= '<a href='.$http.'?action='.$action.'&pag='.$ultima_pag.$morePar.'>'.$ultima_pag.'</a>';
	}
	else {
		$paginacao .= '<a href='.$http.'?action='.$action.'&pag=1'.$morePar.'>1</a>';
		$paginacao .= '<a href='.$http.'?action='.$action.'&pag=1'.$morePar.'>2</a> ... ';
		for ($i = $ultima_pag - (4 + (2 * adjacentes)); $i <= $ultima_pag; $i++)
		{
			if ($i == $pag)
			{
				$paginacao .= '<a class="atual" href='.$http.'?action='.$action.'&pag='.$i.$morePar.'>'.$i.'</a>';
			} else {
				$paginacao .= '<a href='.$http.'?action='.$action.'&pag='.$i.$morePar.'>'.$i.'</a>'	;
			}
		}
	}
}



	if ($prox <= $ultima_pag && $ultima_pag > 2)
	{
		$paginacao .= '<a href='.$http.'?action='.$action.'&pag='.$prox.$morePar.'>pr&oacute;xima &raquo;</a>';
	}

		echo $paginacao;

	echo '</div>';
?>