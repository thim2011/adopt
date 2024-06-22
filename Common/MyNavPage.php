
	<?php
		if( $pageNo > 1 )
		{
			$prevOff = '';		
			$prevPage = $pageNo - 1;		
		}
		else
		{
			$prevOff = 'disabled';
			$urlPrev = '#';
		}
		if( $pageNo < $totalpage )
		{
			$nextOff = '';		
			$nextPage = $pageNo + 1;
		}
		else
		{
			$nextOff = 'disabled';
			$urlNext = '#';
		}
	?>
	<ul class="pagination" id="navPageUL">	
		<li class="page-item <?php echo $prevOff; ?>">
			<a class="page-link" href="#" onclick="myApp.getOnePage(<?php echo $prevPage; ?>);">
				<i class="fas fa-chevron-left"></i>
			</a>		
		</li>
		<?php
			if($totalpage >=2){
				$pageStart = $pageNo - 3;
				if( $pageStart < 1 ) $pageStart = 1; 
				for( $i=0; $i<7; $i++ ) {
					$pNo = $pageStart + $i;
					if( $pNo > $totalpage ) break;
				
					$url = '<a class="page-link" href="#" onclick="myApp.getOnePage('.$pNo.');">'.$pNo.'</a>';
					if( $pNo == $pageNo )
						echo '<li class="page-item active">'.$url.'</li>';
					else
						echo '<li>'.$url.'</li>';
				}
			}
		?>
		<li class="page-item <?php echo $nextOff; ?>">
            <a class="page-link" href="#" onclick="myApp.getOnePage(<?php echo $nextPage; ?>);">
			    <i class="fas fa-chevron-right"></i>
			</a>		
		</li>
	</ul>