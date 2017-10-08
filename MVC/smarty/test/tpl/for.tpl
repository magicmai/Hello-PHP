{foreach $articlelist as $article}
	{$article.title}
	{$article.author}
	{$article.content}
<br />
{foreachelse}
当前没有文章！
{/foreach}