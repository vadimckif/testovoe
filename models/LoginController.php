<?php
namespace app\controllers;
use Yii;
use app\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Mylogin;
use app\models\Allnews;
//use yii\helpers\Url;
class LoginController extends Controller
{
	/*public function behaviors()
	{
		return [[
		'class'=>'app\components\MyFilter',
		//'only'=>['login','reg'],
		//'allow'=>true,
		]
		];
	}*/
	//public $layout='post';
	public $name='Vadim Vladimirovich';
	public function getName()
	{
		return $this->name;
	}
	public function actionLogin()
	{
		$model=new Mylogin();
		$model->scenario='login';
		//$model->load(['Mylogin'=>['username'=>'vadim','password'=>1234567,'email'=>'sdfs']]);
		$model->attributes=['username'=>'vadim','password'=>1234567,'email'=>'sdfs'];
		$validate=$model->validate()?'da':$model->errors;
		/*$model->username='vadim';
		$model->password='123';
		$model->email='asdsa@ukr.met';*/
	return $this->render('login',['model'=>[$validate,$model]]);
	}
	public function actionReg()
	{
				$model=new Mylogin();
		$model->scenario=Mylogin::SCENARIO_REG;
		$model->attributes=['username'=>'vadim','password'=>1234567,'email'=>'sdfs'];
		$validate=$model->validate()?'da':$model->errors;
		return $this->render('reg',['model'=>[$validate,$model]]);
	}
	public function actionPart()
	{
		/*\Yii::$app->view->on(View::EVENT_END_BODY, function () {
    echo date('Y-m-d');
});*/
$get='';
      if(Yii::$app->request->isGet)
	  {
		  $get=$_SERVER;//Yii::$app->request->absoluteUrl;
	  }
		$name="vadim";
		$params=Yii::getAlias('@dir');
		//$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii, framework, php']);
	//	$part= $this->renderPartial('part1',['name'=>$name]);
		return $this->render('part2',['name'=>$name,'pars'=>$get]);
		
	}
	public function actionIndex()
	{
		//AppAsset::register(Yii::$app->view)->baseUrl='768';
		
       //Yii::
		$model=Yii::getAlias('@vadim');
		return $this->render('index',['model'=>$model,'alias'=>Url::to(['http://example.com/'],'https')]);
	}
	public function actionJson()
	{
		/*$arr=['vadim','ira'];
	Yii::$app->response->format=\yii\web\Response::HTML;
		Yii::$app->response->data=$arr;*/
		//debug('45645');
		\Yii::$app->response->sendFile(Yii::getAlias('@app').'/uu.php')->send();
		//Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
       //Yii::$app->response->data= Yii::getAlias('@app');
	   $this->redirect('login/load');

	}
	public function actionLoad()
	{
		$session=Yii::$app->session;
		/*$session=[
		['id'=>1,'name'=>'vadim'],
		['id'=>2,'name'=>'ira'],
		];*/
		$session[0]=['id'=>1,'name'=>'vadim'];
		$session[1]=['id'=>2,'name'=>'ira'];
		$_SESSION[1]['age']=31;
		//$session['my']['vad']='texxt';
		$_SESSION[2]['name']='vova';
		$_SESSION[2]['id']='3';
		debug($_SESSION);
        // $link=Url::to(['login/json']);

		//return $this->render('load',['link'=>$link]);
	}
	
	
	public function my_autoloader($class) {
		$s=Yii::getAlias('@app');
    include $s.'/'.$class.'.php';
}

public function actionTest()
{
	//debug(Yii::$app->db);
	//$all=Yii::$app->db->createCommand('select count(id) as count_of_news ,title,sourse from allnews group by sourse')->queryAll();;
	/*$obj=Yii::$app->db->createCommand('update [[allnews]] set [[item]]=:s where [[id]] >= :id');
	$obj->bindValues([':s'=>'ira11',':id'=>2]);
	debug($obj->execute());*/
	$all=(new \yii\db\Query())
    ->select(['id', 'title'])
    ->from('allnews')
    //->where(['last_name' => 'Smith'])
    ->limit(10)
    ->all();
	debug($all);
	
	
}



	public function actionNow()
    {
        /*function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}
debug(rus2translit('Вадим'));*/
        //debug(Yii::$app->get('comvad')->out());
        //Yii::$app->set('mmm','app\components\Item');
        //debug(Yii::$app->mmm->yy());
        //debug(67567);
        //Yii::setAlias('@raj','app\components');
        //	Yii::setAlias('@rr','@raj\components');
        //$al=Yii::getAlias('@kartik/datetime');
        //debug($Yii::getAlias('@app'));
        //spl_autoload_register([$this,'my_autoloader']);
        //debug(new \Uu());
        //debug(spl_autoload_functions());
        //debug(Yii::$classMap);
        /*$className='app\components\Comvad';
        $classFile = Yii::getAlias('@' . str_replace('\\', '/', $className) . '.php');
        echo $classFile;*/
        //debug(Yii::getAlias('@app\components\Comvad.php'));
        /*$ob=new \app\components\MycomController();
        $ob->attachBehavior('myBehavior2','\app\components\MyBeh');
        debug($ob->out());*/
        // Yii::$app->mycom->ooo();
        // debug(Yii::$app->mycom->out());

        // Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        //     $obj=new \app\components\Comvad(['prop1' => 3, 'prop2' => 4]);
        //  debug(app\components\Comvad::MYCONST);
        //  $obj->on('myconst',[$this,'ev']);
        /*  debug($obj->out());
           $obj1=new \app\components\Comvad(['prop1' => 3, 'prop2' => 4]);
           debug($obj1->out());*/

        //  debug(Yii::$app->comvad->out());
        $arr = [
            ['cat_id' => 1, 'name' => 'krepeg', 'parent_id' => 0],
            ['cat_id' => 2, 'name' => 'shyrypi i bolti', 'parent_id' => 1],
            ['cat_id' => 3, 'name' => 'gvozdi', 'parent_id' => 1],
            ['cat_id' => 4, 'name' => 'klei', 'parent_id' => 1],
            ['cat_id' => 5, 'name' => 'derevo', 'parent_id' => 8],
            ['cat_id' => 6, 'name' => 'doski', 'parent_id' => 5],
            ['cat_id' => 7, 'name' => 'brevna', 'parent_id' => 5],
            ['cat_id' => 8, 'name' => 'material', 'parent_id' => 0],
            ['cat_id' => 9, 'name' => 'kirpichi', 'parent_id' => 10],
            ['cat_id' => 10, 'name' => 'kamen', 'parent_id' => 8],
            ['cat_id' => 11, 'name' => 'gazobloki', 'parent_id' => 10],
        ];

        function getTree($arr_cat,$parent=0)
        {
            $tree=[];
            foreach($arr_cat as $item)
            {
                if($item['parent_id']===$parent)
                {
                    $children=getTree($arr_cat,$item['cat_id']);
                    if($children)
                    {
                        $item['children']=$children;
                    }
                    $tree[]=$item;
                }
            }
            return $tree;
        }

        $tree1= getTree($arr,0);
       function getList($tree)
       {
           $html='<ul>';
           foreach($tree as $item)
           {
               $html.='<li>';
                  $html.=$item['name'];
                  if($item['children'])
                  {
                      $html.=getList(($item['children']));
                  }
               $html.='</li>';
           }
           $html.="</ul>";
           return $html;
       }
       $list=getList($tree1);
       debug($list);

    }









public function actionParser()
{

    $content = '<div itemprop="articleBody"><h2 class="zachem - znat - skolko - stoit - sayt" id="zachem - znat - skolko - stoit - sayt">Зачем знать сколько стоит сайт</h2><p>На сегодняшний день существует огромное множество исполнителей, готовых взяться за разработку вашего сайта. Колоссальная разница в стоимости одного и того же проекта у разных исполнителей поражает, ведь цена сайта начинается <strong>от 100$ и заканчивается космическими цифрами</strong>.</p><p>В данной статье мы расскажем вам о ценообразовании сайта, его составляющих, об уловках к которым прибегают разработчики, дополнительных опциях и поможем вам определить стоимость вашего сайта, чтобы вы получили именно то, чего ждете от исполнителя.</p><h2 class="voprosy - klientov - o - stoimosti - saytov" id="voprosy - klientov - o - stoimosti - saytov">Вопросы клиентов о стоимости сайтов</h2><div itemscope="" itemtype="https://schema.org/FAQPage"><div class="accordeon panel-group" id="faq" role="tablist" aria-multiselectable="true"><div class="panel panel-default anim animated" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question"><div class="panel-heading" role="tab" id="question-1" itemprop="name"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq" href="#answer-1" aria-expanded="false" aria-controls="answer-1">Сколько стоит интернет магазин?</a></div><div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" id="answer-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question-1"><div class="panel-body" itemprop="text">Стоимость <a href="/service/sozdanie-internet-magazinov">интернет магазина</a> определяется исходя из его сложности. Под сложностью понимается архитектура каталога, маркетинговый функционал, а также дополнительные функции. В среднем стоимость интернет магазина начинается от 899$ и может расти в <strong>зависимости от размера и сложности проекта</strong>, который вы хотите реализовать.</div></div></div><div class="panel panel-default anim animated" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question"><div class="panel-heading" role="tab" id="question-2" itemprop="name"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq" href="#answer-2" aria-expanded="false" aria-controls="answer-2">Минимальная стоимость корпоративного сайта</a></div><div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" id="answer-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question-2"><div class="panel-body" itemprop="text">Создание уникального <a href="/service/sozdanie-korporativnogo-sajta">корпоративного сайта</a>, <strong>без шаблонов и большого количества мусорного кода</strong> начинается от 900$, куда входит уникальный дизайн, верстка, адаптация под мобильные устройства, имплементация (программирование), тестирование и правки при запуске проекта.</div></div></div><div class="panel panel-default anim animated" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question"><div class="panel-heading" role="tab" id="question-3" itemprop="name"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq" href="#answer-3" aria-expanded="false" aria-controls="answer-3">Как меняется цена магазина на шаблоне?</a></div><div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" id="answer-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question-3"><div class="panel-body" itemprop="text">Магазин на шаблоне всегда <strong>дешевле на начальном этапе</strong>, но как только возникает необходимость <strong>изменить или добавить специфический функционал, то цена за такую доработку будет в 2-3 раза больше обычной</strong>, поскольку необходимо будет подстраивать существующую архитектуру магазина под новое решение, которое не предусмотрено шаблоном.</div></div></div><div class="panel panel-default anim animated" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question"><div class="panel-heading" role="tab" id="question-4" itemprop="name"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq" href="#answer-4" aria-expanded="false" aria-controls="answer-4">Расходы на сайт разовые или будут еще вложения?</a></div><div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" id="answer-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question-4"><div class="panel-body" itemprop="text">Интернет магазин — это бизнес, и как любая другая предпринимательская деятельность, <strong>требует постоянных вложений</strong>, которые при правильном распределении и подходе конвертируются в доход. К постоянным расходам, несмотря на их незначительность, можно отнести оплату домена и хостинга (ежегодная). Также необходимо заложить бюджет на рекламу и продвижение сайта.</div></div></div></div></div><h2 class="sostavlyayuschie-stoimosti-sayta" id="sostavlyayuschie-stoimosti-sayta">Составляющие стоимости сайта</h2><p>Итак, для того чтобы определить стоимость сайта безусловно необходимо понимать из каких компонентов, этапов и видов работ состоит процесс создания сайта, ведь его стоимость, как и в любой другой сфере, определяется объемами работ, выполненных специалистом, что в свою очередь конвертируется во время, затраченное на разработку.</p><p>Ниже представлен список компонентов и этапов работ, влияющих на стоимость сайта:</p><ol><li>хостинг</li><li>домен</li><li>дизайн</li><li>верстка</li><li>имплементация</li><li>программирование</li><li>тестирование.</li></ol><h3 class="oplata-hostinga" id="oplata-hostinga">Оплата хостинга</h3><p>Постоянная абонплата за услугу по размещению и хранению вашего сайта на сервере, постоянно находящимся в сети. Стоимость услуг хостинга на начало 2020 года начинается <strong>от 20$ в год </strong>и зависит от ресурсоемкости вашего сайта.</p><h3 class="oplata-domena" id="oplata-domena">Оплата домена</h3><p>Абонплата за услугу по аренде доменного имени (доменного адреса, например «rubika.com.ua»), которое будет ссылаться на ваш хостинг, на котором размещен сайт. Стоимость доменного имени зависит от доменной зоны (.com, .ru, .com.ua и т.д.) и начинается от 5$ в год. Например домен в зоне .com обойдется в <strong>15$ в год</strong>, а в зоне .ua — 60$ в год, при условии наличия торговой марки.</p><h3 class="dizayn-sayta" id="dizayn-sayta"><a href="/service/dizayn-sayta">Дизайн сайта</a></h3><p>Проект вашего сайта, представляющий из себя макет в формате PSD (Photoshop document), на котором изображен конечный вид сайта. Создается такой макет в несколько этапов:</p><ul><li>проектирование — обсуждение разделов, функционала, контента сайта и создание мокапа (схемы сайта);</li><li>прорисовка дизайна — создание графического файла в формате PSD для дальнейшей его верстки (примеры представлены ниже);</li><li>утверждение с клиентом — обсуждение, внесение правок, утверждение.</li></ul><div id="gallery-1" class="gallery galleryid-2115 gallery-columns-3 gallery-size-thumbnail row"><dl class="gallery-item col-xs-12 col-sm-6 col-md-4"><dt class="text-center gallery-icon portrait"> <a data-fancybox="gallery" href="https://rubika.com.ua/wp-content/uploads/2018/04/sewtech_homepage_v1.jpg"><img width="200" height="200" src="https://rubika.com.ua/wp-content/uploads/2018/04/sewtech_homepage_v1-200x200.jpg" class="attachment-thumbnail size-thumbnail" alt="Сколько стоит создание сайта - цены на сайт в 2020 году" title="Сколько стоит создание сайта - цены на сайт в 2020 году"></a></dt></dl><dl class="gallery-item col-xs-12 col-sm-6 col-md-4"><dt class="text-center gallery-icon portrait"> <a data-fancybox="gallery" href="https://rubika.com.ua/wp-content/uploads/2018/04/1_home_nirok.jpg"><img width="200" height="200" src="https://rubika.com.ua/wp-content/uploads/2018/04/1_home_nirok-200x200.jpg" class="attachment-thumbnail size-thumbnail" alt="Сколько стоит создание сайта - цены на сайт в 2020 году" title="Сколько стоит создание сайта - цены на сайт в 2020 году"></a></dt></dl><dl class="gallery-item col-xs-12 col-sm-6 col-md-4"><dt class="text-center gallery-icon portrait"> <a data-fancybox="gallery" href="https://rubika.com.ua/wp-content/uploads/2018/04/1_home_nure_dev.jpg"><img width="200" height="200" src="https://rubika.com.ua/wp-content/uploads/2018/04/1_home_nure_dev-200x200.jpg" class="attachment-thumbnail size-thumbnail" alt="Сколько стоит создание сайта - цены на сайт в 2020 году" title="Сколько стоит создание сайта - цены на сайт в 2020 году"></a></dt></dl></div><p>Стоимость работ по данному направлению варьируется в зависимости от уровня исполнителя и его опыта, а также количества типовых страниц. Таким образом, стоимость дизайна прямо пропорциональна уровню и объему. Мы считаем, что хороший дизайн начинается <strong>от 250$</strong>. Срок разработки от 1 недели.</p><h3 class="verstka" id="verstka"><a href="/service/verstka-sayta">Верстка</a></h3><p>Процесс создания интерактивных страниц из дизайн-макета путем нарезания картинок, иконок и других элементов, набора текста и его разметки. Стоимость варьируется в зависимости от нескольких параметров:</p><ul><li>грамотность верстки — правильность разметки, оптимизация, отображение согласно макету;</li><li>наличие адаптивности — страница подстраивается под размеры любого экрана, с ней удобно взаимодействовать на любом устройстве;</li><li>объем — количество страниц сайта и их сложность.</li></ul><p>В целом стоимость верстки начинается <strong>от 60$</strong> за страницу. Срок разработки от 2-3 дней.</p><h3 class="implementaciya" id="implementaciya">Имплементация</h3><p>Программирования и тестирования сайта зависят от сложности и от объема работ на этих этапах и сделать даже примерный просчет сложно. Однако если вам необходим обычный информационный сайт или простой интернет магазин, то стоимость этих этапов может обойтись примерно <strong>по 100$</strong> за каждый. Сроки разработки от 2-3 недель.</p><blockquote><p>Стоимость разработки сайта в компании составит<strong> 500-600$</strong>, при меньших значения скорее всего получится сырой и недоделанный продукт.</p></blockquote><p>Теперь подсчитаем все этапы и в сумме получаем примерный минимальный порог для разработки сайта около 500$. Если стоимость сайта ниже озвученной, вероятность получить некачественный продукт растет в геометрической прогрессии.</p><h2 class="cena-sayta-na-shablone-pokupka-gotovogo-sayta" id="cena-sayta-na-shablone-pokupka-gotovogo-sayta">Цена сайта на шаблоне, покупка готового сайта</h2><p>Безусловно, стоимость сайта созданного на шаблоне, резко уменьшается за счет отсутствия необходимости разработки дизайна, верстки и имплементации. Таким образом цена за создание шаблонного сайта зачастую ниже на порядок и позволяет <strong>сэкономить порядка 400$</strong> на разработке, а также сократить время реализации проекта.</p><p>Однако данный вид продукта является непрактичным и непригодным в долгосрочной перспективе ввиду качества его реализации, а также ограниченности выбранным шаблоном. Также использование шаблона может вызвать затруднения при работе с контентом сайта или быть <strong>причиной взлома вашего сайта</strong>.</p><p>Шаблоны делятся на платные, бесплатные и взломанные. В зависимости от выбора можно столкнуться с разными трудностями.</p><p><strong>Создание сайта на платном шаблоне</strong>. Такие шаблоны имеют определенную структуру, доработать или изменить которую имеется возможность только путем изменения файлов шаблона, которые могут обновляться (в случае если шаблон поддерживается и обновляется), что в свою очередь приводит к потере изменений. Также дополнительную сложность при работе с шаблоном вызывают всевозможные методы защиты от воровства шаблона.</p><p><strong>Разработка сайта на бесплатном шаблоне</strong>. Бесплатные шаблоны в большинстве своем создаются новичками и не отличаются особым качеством верстки и стабильностью работы.</p><p>Создание сайта на взломанном шаблоне чревато тем, что разработчик, который «обнулил» (взломал) шаблон, с легкостью мог разместить вредоносный код или «бэкдор» (backdoor — задняя дверь, позволяет войти в систему в обход системам учетных записей) который сложно обнаружить. Такие шаблоны не обновляются, тем самым добавляя еще одну возможность взломать сайт.</p><p>Как следствие, все трудности к которым приводит создание сайта на шаблоне, ведут к увеличению того бюджета, который был заложен изначально, плюс на выходе получаем некое подобие чудовища Франкенштейна, т.к. при работе с шаблоном нет нет, да используются разного рода костыли.</p><h3 class="stoimost-shablonnogo-sayta-vizitki" id="stoimost-shablonnogo-sayta-vizitki">Стоимость шаблонного <a href="/service/zakazat-sajt-vizitku">сайта визитки</a></h3><p>Создание информационного сайта на шаблоне является одним из наиболее распространенных предложений на рынке. Клиенту предлагают запустить сайт за 1 день или неделю, что сразу свидетельствует о использовании шаблонного сайта. Стоимость таких предложений в первой половине 2020 года начинается <strong>от 100$</strong>.</p><p>При создании сайта визитки на шаблоне можно столкнуться с несколькими трудностями:</p><ul><li>сложность в SEO оптимизации;</li><li>сложность изменения принципа работы блоков;</li><li>сложность изменения структуры страниц и разделов сайта;</li><li>сложность добавления полей, блоков, элементов.</li></ul><p>В целом работа с чужим кодом достаточно проблематичная процедура, требующая уверенных знаний в психологии и умения мыслить как другой разработчик.</p><h3 class="cena-internet-magazina-na-shablone" id="cena-internet-magazina-na-shablone">Цена интернет магазина на шаблоне</h3><p>Разработка интернет магазина на шаблоне — самый рискованный проект, ведь ко всем вышеперечисленным трудностям, с которыми может столкнуться клиент, добавляются особенности продукта, особенности сферы торговли и многое другое. Стоимость шаблонного интернет магазина начинается <strong>от 200$</strong>.</p><p>На практике исполнители, занимающиеся созданием интернет магазинов на шаблоне, не работают с индивидуальными разработками. То есть любой дополнительный функционал, который может быть необходим клиенту для реализации продукта, и отсутствующий в бесплатном доступе в виде модулей в интернете, будет непреодолимой преградой.</p><h2 class="sozdanie-sayta-na-konstruktore" id="sozdanie-sayta-na-konstruktore">Создание сайта на конструкторе</h2><p>Еще одним популярным маркетинговым предложением для «быстрого запуска» сайта является использование конструкторов для создания сайта. Мы уже освещали данный подход к реализации сайта в других статьях нашего блога:</p><ul><li><a href="/blog/sozdanie-deshevogo-sajta-gotovye-reshenija">Создание дешевого сайта: готовые решения</a></li><li><a href="/blog/sozdanie-internet-magazina-dolgo-dorogo-besplatno">Создание интернет магазина: долго и дорого или бесплатно?</a></li><li><a href="/blog/internet-magazin-na-prom-ua-bystryj-start-ili-nevygodnaja-arenda">Интернет магазин на Prom.ua — быстрый старт или невыгодная аренда?</a></li></ul><p>В текущей же статье мы пройдемся по ключевым его аспектам. Данный метод разработки схож с созданием сайта на шаблоне, однако есть некоторые ключевые отличия:</p><ol><li>Относительно <strong>сложная административная панель</strong>, где вы или разработчик производит настройку внешнего вида, настраивает каждый елемент и страницу.</li><li>Отсутствие доступа к исходному коду сайта, и как следствие — <strong>отсутствие возможности изменять</strong> принцип его работы или дорабатывать свой собственный, даже самый простой, <strong>функционал</strong>.</li><li>В бесплатных версиях конструкторов на каждую страницу вашего сайта <strong>добавляется реклама</strong>.</li><li>Вы становитесь зависимы от платформы, и <strong>в случае ее закрытия остаетесь ни с чем</strong>.</li></ol><p>Одним из первых популярных конструкторов для сайтов был сервис uCoz (ucoz.ru), открывшись еще в 2005 году, данный сервис все еще существует, но его упорно вытесняют конкуренты, такие как Tilda, Prom, Wix и другие.</p><p>На сегодняшний день существует порядка десятка популярных конструкторов для разработки сайтов разного типа и уровня сложности, однако, несмотря на все усилия, приложенные к упрощению процесса разработки сайта, качество получаемого продукта далеко от индивидуальных решений.</p><h3 class="konstruktor-saytov-tilda-publishing" id="konstruktor-saytov-tilda-publishing">Конструктор сайтов Tilda Publishing</h3><p><iframe width="100%" height="450" src="https://www.youtube.com/embed/EO0OTYjfNrY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe></p><h3 class="ukit-konstruktor-saytov-dlya-biznesa" id="ukit-konstruktor-saytov-dlya-biznesa">uKit — Конструктор сайтов для бизнеса</h3><p><iframe width="100%" height="450" src="https://www.youtube.com/embed/jII90hkzKzw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe></p><h2 class="stoimost-sayta-pod-klyuch-v-rubika" id="stoimost-sayta-pod-klyuch-v-rubika">Стоимость сайта под ключ в Rubika</h2><p>Наша команда уверена, что создание сайтов под ключ — единственный правильный выход в разработке вашего интернет ресурса. Наши клиенты получают индивидуальные решения, разработанные специально под их требования, которые обладают интуитивной панелью управления и ими легко управлять.</p><p>Мы не предлагаем шаблонные решения, но мы можем быстро разработать простой сайт с оригинальным дизайном с заделом на будущее для старта работы при минимальных бюджетах. Команда Rubika стремится к долгосрочному сотрудничеству, создает качественный продукт, обеспечивает поддержку и помогает клиентам в ведении бизнеса в сети Интернет.</p><h3 class="cena-korporativnogo-sayta" id="cena-korporativnogo-sayta">Цена корпоративного сайта</h3><p>Стоимость информационного сайта формируется исходя из его структуры, дополнительного функционала, таких как формы, калькуляторы расчета стоимости и других маркетинговых фишек. В среднем цена корпоративного сайта начинается <strong>от 700$</strong>.</p><p>В стоимость входит: разработка индивидуального дизайна, адаптивная верстка, имплементация, программирование и тестирование. По итогу работы вы получаете гибки и простой в управлении корпоративный сайт.</p><h3 class="stoimost-internet-magazina-pod-klyuch" id="stoimost-internet-magazina-pod-klyuch">Стоимость <a href="/service/sozdanie-internet-magazinov">интернет магазина под ключ</a></h3><p>Сегодня интернет магазин — основной инструмент увеличения продаж в сфере торговли, и команда Rubika ответственно подходит к разработке каждого интернет магазина. Мы плотно взаимодействуем с клиентом на стадии разработки дизайна, ведь зачастую, именно клиент, владелец бизнеса, знает свою целевую аудиторию и использует механизмы взаимодействия с ней.</p><p>Мы создаем авторские модули и дополнения для популярных CMS для расширения их функционала согласно требований клиента.&nbsp;Наша команда разрабатывает архитектуру вашего проекта согласно всем правилам проектирования и создает точный и гибкий механизм управления вашим интернет магазином при минимальной его стоимости — <strong>от 900$</strong>.</p></div>';


    function tipaParser($content)
    {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
            'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        );

$html='<ul>';
        $arr = [];
        preg_match_all('/<h([1-6])(.*?)>(.*?)<\/h[1-6]>/', $content, $out, PREG_SET_ORDER);
        foreach ($out as $item) {


            preg_match('/id="(.*?)"/', $item[2], $match);
            if (!$match) {
                continue;
            }

            $ancor = strtr(strip_tags($item[3]), $converter);
            $jacor = "#" . $match[1];
            $link = '<a href="' . $jacor . '">' . $ancor . '</a>';
            $arr[] = $link;

        }
        foreach($arr as $item)
        {
            $html.="<li>".$item."</li>";
        }
$html.="</ul>";

        debug($html);
        debug($content);
    }
   // tipaParser()
    tipaParser($content);
}

public function actionBuilder()
{
	$obj=(new \yii\db\Query());
	
	$obj->select(['count(p.product_id) as count_p']);
    $obj->from('oc_product p');
	$obj->join('LEFT JOIN','oc_product_description pd','p.product_id=pd.product_id');
	$obj->join('INNER JOIN','oc_product_option_value pov','pov.product_id=p.product_id');
	$obj->where(['pd.language_id'=>1]);
	
	$obj->groupBy(['p.product_id']);

	
$obj1=(new \yii\db\Query());
$obj1->select(['max(count_p) as max_count']);
 $obj1->from(['m'=>$obj]);
	
	
	$obj2=(new \yii\db\Query())
	->select(['p.product_id','p.model','p.price','pd.name','count(p.product_id) as count_p'])
	//$obj2->select(['count(p.product_id) as count_p']);
    ->from('oc_product p')
	->join('LEFT JOIN','oc_product_description pd','p.product_id=pd.product_id')
	->join('INNER JOIN','oc_product_option_value pov','pov.product_id=p.product_id')
	->where(['pd.language_id'=>1])
	->having(['count_p'=>$obj1])
    // $obj2->limit(1);
	->groupBy(['p.product_id'])
	->createCommand();
	
	
	debug($obj2->sql);
	
    
// показать SQL запрос
//echo $command->sql;
	
	//debug($obj2->queryAll());
	
    /* $all=$obj2->all();
debug($obj2);	 
	debug($all);*/
	
}
public function actionQuery()
{
	//debug((new \app\models\Country()));
	
	
//	$a=\app\models\Country::find()->select(['c.category_id as cat_id','cd.name as nname'])->from('oc_category c')->join('LEFT JOIN','oc_category_description cd','cd.category_id=c.category_id')->where(['cd.language_id'=>1])->asArray()->all();
	//$a=\app\models\Country::findOne(124);
	
//	debug($a);
	$ob=new \app\models\Country();
	$ob->on(\app\models\Country::MY_EV, [$this, 'methodName']);
	debug($ob->ii());
	//$ob=\app\models\Country::findOne(11);
	
	//$ob->name=json_encode(['vadim','ira']);
	//debug($ob->save(false)?$ob->getOldAttributes() :$ob->errors);
	
	
}
public function methodName($e)
{
	$e->sender->ev=$e->sender->ev*2;
}




}
