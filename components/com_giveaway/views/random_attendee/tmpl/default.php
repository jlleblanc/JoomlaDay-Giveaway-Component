<?php defined( '_JEXEC' ) or die; 

fb($this->random);
?>
<?php if ($this->random): ?>
	<?php echo $this->random->name ?>
	<img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower($this->random->email)) ?>?r=g" />	
<?php endif ?>
