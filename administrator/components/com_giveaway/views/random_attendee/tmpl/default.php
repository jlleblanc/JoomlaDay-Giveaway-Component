<?php defined( '_JEXEC' ) or die; ?>
<?php if ($this->random): ?>
	<img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower($this->random->email)) ?>?r=g" />
	<p><?php echo $this->random->name ?></p>
<?php endif ?>
