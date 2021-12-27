<?php
namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Comments;
use DB;

class NewsController extends Controller
{
	private static $NEWS_COUNT = 3;
	private static $ORDER_RANDOM = 0;
	private static $ORDER_TITLE = 1;
	private static $ORDER_DATE = 2;
	private static $ASC = 1;
	private static $DESC = 2;

	public function index($order = 0, $line = 0, $this_page = 1)
	{
		$posts_count = DB::table('posts')->count();
		$last_page = ceil($posts_count / self::$NEWS_COUNT);
		
		if (1 < $this_page) {
			$prev_page = $this_page - 1;
		} else {
			$prev_page = 0;
		}

		if ($this_page < $last_page) {
			$next_page = $this_page + 1;
		} else {
			$next_page = 0;
		}

		if ($order == self::$ORDER_RANDOM && $line == self::$ORDER_RANDOM) {
			$posts = Posts::inRandomOrder()
				->take(self::$NEWS_COUNT)
				->skip(self::$NEWS_COUNT*($this_page-1))
				->get();
		} elseif ($order == self::$ORDER_TITLE && $line == self::$ASC) {
			$posts = Posts::orderBy('title', 'ASC')
				->take(self::$NEWS_COUNT)
				->skip(self::$NEWS_COUNT*($this_page-1))
				->get();
		} elseif ($order == self::$ORDER_TITLE && $line == self::$DESC) {
			$posts = Posts::orderBy('title', 'DESC')
				->take(self::$NEWS_COUNT)
				->skip(self::$NEWS_COUNT*($this_page-1))
				->get();
		} elseif ($order == self::$ORDER_DATE && $line == self::$ASC) {
			$posts = Posts::orderBy('created_at', 'ASC')
				->take(self::$NEWS_COUNT)
				->skip(self::$NEWS_COUNT*($this_page-1))
				->get();
		} elseif ($order == self::$ORDER_DATE && $line == self::$DESC) {
			$posts = Posts::orderBy('created_at', 'DESC')
				->take(self::$NEWS_COUNT)
				->skip(self::$NEWS_COUNT*($this_page-1))
				->get();
		}

		return view(
			'index',
			[
				'news' => $posts,
				'order' => $order,
				'line' => $line,
				'prev_page' => $prev_page,
				'this_page' => $this_page,
				'next_page' => $next_page
			]
		);
	}

	public function showOneNews($slug)
	{
		$post = Posts::where('slug', '=', $slug)->get()[0];
		$comments = Comments::where('news_id', '=', $post->id)->get();
		
	//	$post->body = htmlentities($post->body);

		return view(
			'oneNews',
			[
				'news' => $post,
				'comments' => $comments
			]
		);
	}
}
?>