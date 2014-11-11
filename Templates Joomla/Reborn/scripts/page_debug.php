<?php
     // Display debug
	 if($this->params->get('debug') != 'hidden'){
	    $article =& JTable::getInstance('content');
	    $article->load($idArt);
	    $article_title = $article->get('title');
?>
	<script>
		var fragment = document.createDocumentFragment();

		var debug = document.createElement('div');
		debug.setAttribute('id','debug');

		var dbgJoomlaParam = document.createElement('ul');
		dbgJoomlaParam.style.display = 'none';

		var txt = document.createTextNode('Option : <?php if($option){echo $option;} ?>')
		var li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('View : <?php if($view){echo $view;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('Layout : <?php if($layout){echo $layout;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('Task : <?php if($task){echo $task;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('Itemid : <?php if($itemid){echo $itemid;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('idCat : <?php if($idCat){echo $idCat;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode('idArt : <?php if($idArt){echo $idArt;} ?>')
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		txt = document.createTextNode("titleArt : <?php if($article_title){echo $article_title;} ?>")
		li = document.createElement('li');
		li.appendChild(txt);
		dbgJoomlaParam.appendChild(li);

		var dbgToggle = document.createElement('div');
		dbgToggle.appendChild(document.createTextNode("Debug"));
		var dbgToggleFtn = function(){
			if(dbgJoomlaParam.style.display === 'none'){
				dbgJoomlaParam.style.display = 'block';
			}else{
				dbgJoomlaParam.style.display = 'none';
			}
		};
		dbgToggle.onclick = dbgToggleFtn;

		debug.appendChild(dbgToggle);
		debug.appendChild(dbgJoomlaParam);
		fragment.appendChild(debug);

		document.body.appendChild(fragment);
	</script>
<?php
	 }
?>