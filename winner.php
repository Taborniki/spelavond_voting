<?php
// huidige directory nummer
$dirNum = 1;

// usorts

function compareByNumOfVotes($a, $b) 
{
  return $b[0] - $a[0];
}

// votes data ophalen
$recoveredData = file_get_contents($dirNum . "/votes.data");
$votes = unserialize($recoveredData);

// sorteren volgens number of 
usort($votes, "compareByNumOfVotes");

// eerste plaats in array heeft max aantal votes
$maxVotes = $votes[0][0];

// info over votes berekenen
$numOfGames = count($votes);
$maxVotes = $votes[0][0];

$winnaars = array();

// andere games zoeken met even veel votes (execo)
for($i = 0; $i < $numOfGames; $i++)
{
	if($votes[$i][0] == $maxVotes) // execo met winnaar
	{
		array_push($winnaars,$votes[$i][1]);
	}
	else
	{
		break;
	}

}

print_r($winnaars);
?>
