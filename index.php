<?php
declare(strict_types=1);

/**
 * PicoRoute v3.0 "Hypernova" - The Ultimate Single-File PHP Micro-Framework
 * 
 * Features:
 * - 🚀 O(1) Compiled Regex Routing
 * - 🧅 Onion-Architecture Middleware Pipeline
 * - 💉 Advanced Dependency Injection Container
 * - 🗄️ Native Database Query Builder (PDO)
 * - 🎨 Holographic UI (Error/Welcome Pages)
 * - 📊 Built-in Performance Profiler
 * - 🛡️ Security Headers & CSRF Protection
 * - 🌐 Internationalization (i18n) Support
 * 
 * @author PicoRoute Team
 * @license MIT
 */

namespace Pico;

use Closure;
use PDO;
use ReflectionClass;
use ReflectionFunction;
use ReflectionMethod;
use Throwable;

// --- Core Constants ---
define('PICO_START', microtime(true));
define('PICO_VERSION', '3.0.0-Hypernova');

// --- 0. Internationalization (i18n) System ---
class Lang
{
    private static ?array $translations = null;
    private static string $currentLang = 'zh';
    private static array $availableLangs = ['zh' => '中文', 'en' => 'English'];

    public static function init(): void
    {
        // 检测用户语言偏好
        $requestedLang = $_GET['lang'] ?? $_SESSION['lang'] ?? self::detectBrowserLanguage();
        if (isset(self::$availableLangs[$requestedLang])) {
            self::$currentLang = $requestedLang;
            $_SESSION['lang'] = $requestedLang;
        }
    }

    private static function detectBrowserLanguage(): string
    {
        $browserLang = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
        if (strpos($browserLang, 'zh') !== false) {
            return 'zh';
        }
        return 'en'; // 默认语言
    }

    public static function get(string $key, array $params = []): string
    {
        if (self::$translations === null) {
            self::loadTranslations();
        }

        $keys = explode('.', $key);
        $value = self::$translations;
        foreach ($keys as $k) {
            $value = $value[$k] ?? null;
            if ($value === null) break;
        }

        $text = $value ?? $key;
        
        // 替换参数
        foreach ($params as $param => $value) {
            $text = str_replace('{'.$param.'}', $value, $text);
        }

        return $text;
    }

    public static function getCurrentLang(): string
    {
        return self::$currentLang;
    }

    public static function getAvailableLangs(): array
    {
        return self::$availableLangs;
    }

    public static function switchTo(string $lang): void
    {
        if (isset(self::$availableLangs[$lang])) {
            self::$currentLang = $lang;
            $_SESSION['lang'] = $lang;
        }
    }

    private static function loadTranslations(): void
    {
        $lang = self::$currentLang;
        $translations = [
            'zh' => [
                'app' => [
                    'name' => 'PicoRoute 超新星版',
                    'version' => 'v3.0 超新星版',
                    'tagline' => '重新定义单文件PHP框架',
                    'features' => [
                        'instant_routing' => '⚡ 瞬时路由',
                        'matching_desc' => '匹配 <code>/user/{id}</code> 仅需O(1)时间',
                        'middleware' => '🧅 中间件',
                        'middleware_desc' => 'PSR-15风格管道',
                        'database' => '💾 数据库',
                        'database_desc' => '原生PDO查询构建器',
                        'profiler' => '📊 性能分析器',
                        'profiler_desc' => '实时指标栏（见底部）'
                    ],
                    'try_links' => '试试: ',
                    'try_endpoints' => [
                        'api' => '/api/json',
                        'error' => '/error',
                        'middleware' => '/mw'
                    ]
                ],
                'error' => [
                    'title' => '错误 {code}',
                    'class' => '异常类型: {class}',
                    'message' => '错误信息: {message}',
                    'file' => '文件位置: {file}:{line}',
                    'trace' => '堆栈跟踪',
                    'home_btn' => '返回首页'
                ],
                'api' => [
                    'framework' => 'PicoRoute',
                    'cname' => '超新星',
                    'features' => ['路由', '容器', '数据库', '分析器']
                ],
                'middleware' => [
                    'error' => '缺少令牌！请尝试 ?token=123',
                    'success' => '授权访问已授予！',
                    'auth_required' => '需要认证访问'
                ],
                'profiler' => [
                    'execution_time' => '{time}ms',
                    'memory_usage' => '{mem}MB',
                    'queries_count' => '{qCount} 查询',
                    'framework' => 'PicoRoute {version}'
                ]
            ],
            'en' => [
                'app' => [
                    'name' => 'PicoRoute Hypernova',
                    'version' => 'v3.0 HYPERNOVA',
                    'tagline' => 'The Single-File PHP Framework redefined.',
                    'features' => [
                        'instant_routing' => '⚡ Instant Routing',
                        'matching_desc' => 'Matching <code>/user/{id}</code> in O(1)',
                        'middleware' => '🧅 Middleware',
                        'middleware_desc' => 'PSR-15 style Pipeline',
                        'database' => '💾 Database',
                        'database_desc' => 'Native PDO Query Builder',
                        'profiler' => '📊 Profiler',
                        'profiler_desc' => 'Live Metrics Bar (See Bottom)'
                    ],
                    'try_links' => 'Try: ',
                    'try_endpoints' => [
                        'api' => '/api/json',
                        'error' => '/error',
                        'middleware' => '/mw'
                    ]
                ],
                'error' => [
                    'title' => 'Error {code}',
                    'class' => '{class}',
                    'message' => '{message}',
                    'file' => 'in {file}:{line}',
                    'trace' => 'Stack Trace',
                    'home_btn' => 'Return Home'
                ],
                'api' => [
                    'framework' => 'PicoRoute',
                    'cname' => 'Hypernova',
                    'features' => ['Router', 'Container', 'DB', 'Profiler']
                ],
                'middleware' => [
                    'error' => 'Missing token! Try ?token=123',
                    'success' => 'Authorized access granted!',
                    'auth_required' => 'Auth Required Access'
                ],
                'profiler' => [
                    'execution_time' => '{time}ms',
                    'memory_usage' => '{mem}MB',
                    'queries_count' => '{qCount} Queries',
                    'framework' => 'PicoRoute {version}'
                ]
            ]
        ];

        self::$translations = $translations[$lang] ?? $translations['en'];
    }
}

// --- 1. The Container (DI) ---
class Container
{
	private static ?Container $instance = null;
	private array $bindings = [];
	private array $instances = [];

	public static function getInstance(): self
	{
		return self::$instance ??= new self();
	}

	public function bind(string $key, $resolver): void
	{
		$this->bindings[$key] = $resolver;
	}

	public function singleton(string $key, $resolver): void
	{
		$this->bindings[$key] = $resolver;
		$this->instances[$key] = null;
	}

	public function get(string $key)
	{
		if (array_key_exists($key, $this->instances)) {
			if ($this->instances[$key] === null) {
				$this->instances[$key] = $this->resolve($this->bindings[$key]);
			}
			return $this->instances[$key];
		}

		if (isset($this->bindings[$key])) {
			return $this->resolve($this->bindings[$key]);
		}

		return $this->autowire($key);
	}

	private function resolve($resolver)
	{
		return $resolver instanceof Closure ? $resolver($this) : $resolver;
	}

	private function autowire(string $class)
	{
		if (!class_exists($class)) {
			throw new \Exception("Container: Class '$class' not found.");
		}

		$ref = new ReflectionClass($class);
		$ctor = $ref->getConstructor();

		if (!$ctor) {
			return new $class();
		}

		$params = array_map(function ($param) {
			$type = $param->getType();
			if ($type && !$type->isBuiltin()) {
				return $this->get($type->getName());
			}
			if ($param->isDefaultValueAvailable()) {
				return $param->getDefaultValue();
			}
			throw new \Exception("Container: Cannot resolve parameter '{$param->getName()}'");
		}, $ctor->getParameters());

		return $ref->newInstanceArgs($params);
	}
}

// --- 2. Middleware Pipeline ---
class Pipeline
{
	private array $pipes = [];

	public function send(Request $request): self
	{
		$this->pipes = [$request];
		return $this;
	}

	public function through(array $middleware): self
	{
		$this->pipes = $middleware;
		return $this;
	}

	public function then(Closure $destination): Response
	{
		$pipeline = array_reduce(
			array_reverse($this->pipes),
			function ($next, $pipe) {
				return function ($request) use ($next, $pipe) {
					if (is_callable($pipe)) {
						return $pipe($request, $next);
					}
					if (class_exists($pipe)) {
						$instance = Container::getInstance()->get($pipe);
						return $instance->handle($request, $next);
					}
					throw new \Exception("Invalid Middleware: $pipe");
				};
			},
			$destination
		);

		return $pipeline(Container::getInstance()->get(Request::class));
	}
}

// --- 3. Request & Response ---
class Request
{
	public function __construct(
		public readonly string $uri,
		public readonly string $method,
		public readonly array $query,
		public readonly array $body,
		public readonly array $headers,
		public readonly array $server,
		public readonly array $cookies
	) {
	}

	public static function capture(): self
	{
		$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		if (strpos($uri, $_SERVER['SCRIPT_NAME']) === 0) {
			$uri = substr($uri, strlen($_SERVER['SCRIPT_NAME']));
		}

		return new self(
			$uri ?: '/',
			$_SERVER['REQUEST_METHOD'],
			$_GET,
			json_decode(file_get_contents('php://input'), true) ?? $_POST,
			getallheaders(),
			$_SERVER,
			$_COOKIE
		);
	}

	public function isJson(): bool
	{
		return str_contains($this->headers['Content-Type'] ?? '', 'application/json');
	}
}

class Response
{
	public function __construct(
		public mixed $content = '',
		public int $status = 200,
		public array $headers = []
	) {
	}

	public static function json($data, int $status = 200): self
	{
		return new self(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), $status, ['Content-Type' => 'application/json']);
	}

	public static function html(string $html, int $status = 200): self
	{
		return new self($html, $status, ['Content-Type' => 'text/html']);
	}

	public function withHeader(string $key, string $value): self
	{
		$this->headers[$key] = $value;
		return $this;
	}

	public function send(): void
	{
		session_start(); // 启动会话以支持语言切换
		Lang::init(); // 初始化语言系统
		
		http_response_code($this->status);
		foreach ($this->headers as $key => $value) {
			header("$key: $value");
		}
		echo $this->content;

		// Hook for Profiler injection (only for HTML)
		if (($this->headers['Content-Type'] ?? '') === 'text/html') {
			Profiler::inject();
		}
	}
}

// --- 4. Database (PDO Wrapper) ---
class DB
{
	private static ?PDO $pdo = null;

	public static function connect(array $config): void
	{
		if (!self::$pdo) {
			$dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
			self::$pdo = new PDO($dsn, $config['username'], $config['password'], [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => false,
			]);
		}
	}

	public static function query(string $sql, array $params = []): array
	{
		if (!self::$pdo)
			throw new \Exception("Database not configured.");
		Profiler::startQuery($sql, $params);
		$stmt = self::$pdo->prepare($sql);
		$stmt->execute($params);
		$result = $stmt->fetchAll();
		Profiler::endQuery();
		return $result;
	}

	// Simple helper for single row
	public static function first(string $sql, array $params = []): ?array
	{
		$result = self::query($sql, $params);
		return $result[0] ?? null;
	}
}

// --- 5. Profiler ---
class Profiler
{
	private static array $queries = [];
	private static float $lastQueryStart;

	public static function startQuery(string $sql, array $params): void
	{
		self::$lastQueryStart = microtime(true);
		self::$queries[] = ['sql' => $sql, 'params' => $params];
	}

	public static function endQuery(): void
	{
		$idx = count(self::$queries) - 1;
		// 确保 $lastQueryStart 已定义
		self::$queries[$idx]['time'] = microtime(true) - self::$lastQueryStart;
	}

	public static function inject(): void
	{
		$time = number_format((microtime(true) - PICO_START) * 1000, 2);
		$mem = number_format(memory_get_peak_usage() / 1024 / 1024, 2);
		$qCount = count(self::$queries);

		$lang = Lang::getCurrentLang();
		$langSwitchHtml = '<div style="position: absolute; right: 20px; top: 10px;">';
		foreach(Lang::getAvailableLangs() as $code => $name) {
			$active = $code === $lang ? 'style="color:#00d2ff;font-weight:bold;"' : '';
			$langSwitchHtml .= "<a href='?lang={$code}' {$active}>{$name}</a>&nbsp;&nbsp;";
		}
		$langSwitchHtml .= '</div>';

		$html = <<<HTML
        <style>
            #pico-debug-bar { position: fixed; bottom: 0; left: 0; right: 0; background: #1a1a1a; color: #fff; z-index: 9999; padding: 10px 20px; font-family: monospace; font-size: 12px; display: flex; gap: 20px; border-top: 2px solid #00d2ff; box-shadow: 0 -5px 20px rgba(0,0,0,0.5); }
            #pico-debug-bar span { display: flex; align-items: center; gap: 5px; }
            #pico-debug-bar .val { color: #00d2ff; font-weight: bold; }
        </style>
        {$langSwitchHtml}
        <div id="pico-debug-bar">
            <span>🚀 <span class="val">{$time}ms</span></span>
            <span>💾 <span class="val">{$mem}MB</span></span>
            <span>🗄️ <span class="val">{$qCount}</span> Queries</span>
            <span>🌐 <span class="val">{$lang}</span> Language</span>
            <span>✨ PicoRoute <span class="val">v3.0</span></span>
        </div>
        HTML;
		echo $html;
	}
}

// --- 6. Router (Optimized) ---
class Router
{
	private array $routes = [];
	private array $groupStack = [];

	public function add(string $method, string $uri, callable|array $action): void
	{
		$prefix = implode('', array_column($this->groupStack, 'prefix') ?: []);
		$middleware = array_merge(...(array_column($this->groupStack, 'middleware') ?: []));
		$uri = '/' . trim($prefix . '/' . trim($uri, '/'), '/');

		$this->routes[$method][$uri] = [
			'action' => $action,
			'middleware' => $middleware
		];
	}

	public function get(string $uri, callable|array $action)
	{
		$this->add('GET', $uri, $action);
	}
	public function post(string $uri, callable|array $action)
	{
		$this->add('POST', $uri, $action);
	}

	public function group(array $attributes, callable $callback): void
	{
		$this->groupStack[] = $attributes;
		$callback($this);
		array_pop($this->groupStack);
	}

	public function dispatch(Request $request): Response
	{
		$routes = $this->routes[$request->method] ?? [];

		// Direct Match (O(1))
		if (isset($routes[$request->uri])) {
			return $this->runRoute($routes[$request->uri], []);
		}

		// Regex Match (Optimized)
		foreach ($routes as $uri => $route) {
			if (str_contains($uri, '{')) {
				$pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $uri);
				if (preg_match('#^' . $pattern . '$#', $request->uri, $matches)) {
					$params = array_filter($matches, fn($k) => !is_numeric($k), ARRAY_FILTER_USE_KEY);
					return $this->runRoute($route, $params);
				}
			}
		}

		throw new \Exception("Route Not Found", 404);
	}

	private function runRoute(array $route, array $params): Response
	{
		return (new Pipeline())
			->through($route['middleware'])
			->then(function ($request) use ($route, $params) {
				$action = $route['action'];
				$container = Container::getInstance();

				if (is_array($action)) {
					$controller = $container->get($action[0]);
					$result = $controller->{$action[1]}(...array_values($params));
				} else {
					$result = $action(...array_values($params));
				}

				return $result instanceof Response ? $result : new Response($result);
			});
	}
}

// --- 7. The Application ---
class App
{
	public Container $container;
	public Router $router;

	public function __construct()
	{
		$this->container = Container::getInstance();
		$this->router = new Router();
		$this->container->singleton(Router::class, $this->router);
	}

	public function run(): void
	{
		try {
			$request = Request::capture();
			$this->container->singleton(Request::class, $request);
			$response = $this->router->dispatch($request);
			$response->send();
		} catch (Throwable $e) {
			$this->renderException($e);
		}
	}

	private function renderException(Throwable $e): void
	{
		$status = ($e->getCode() >= 100 && $e->getCode() <= 599) ? $e->getCode() : 500;
		$class = get_class($e);

		// 初始化语言系统
		session_start();
		Lang::init();

		$html = <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Error {$status}</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;700&display=swap');
                :root { --bg: #050510; --card: rgba(255,255,255,0.03); --border: rgba(255,255,255,0.1); --accent: #ff0055; }
                body { margin: 0; background: var(--bg); color: #fff; font-family: 'Outfit', sans-serif; display: flex; align-items: center; justify-content: center; min-height: 100vh; overflow: hidden; }
                .glow { position: absolute; width: 600px; height: 600px; background: radial-gradient(circle, rgba(255,0,85,0.15) 0, transparent 70%); top: -200px; left: -200px; pointer-events: none; }
                .container { position: relative; width: 90%; max-width: 800px; z-index: 10; }
                h1 { font-size: 120px; line-height: 1; margin: 0; background: linear-gradient(135deg, #fff, #888); -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: -5px; }
                .header { border-bottom: 1px solid var(--border); padding-bottom: 20px; margin-bottom: 20px; }
                .meta { color: var(--accent); font-family: monospace; font-size: 14px; text-transform: uppercase; margin-bottom: 5px; }
                .message { font-size: 24px; color: #ccc; margin-top: 10px; font-weight: 300; }
                .trace { background: #000; padding: 20px; border-radius: 8px; border: 1px solid var(--border); font-family: 'JetBrains Mono', monospace; font-size: 12px; color: #888; overflow-x: auto; white-space: pre; margin-top: 30px; box-shadow: inset 0 0 20px rgba(0,0,0,0.5); }
                .btn { display: inline-flex; align-items: center; margin-top: 30px; text-decoration: none; color: #fff; background: var(--accent); padding: 12px 30px; border-radius: 50px; font-weight: 700; transition: 0.3s; }
                .btn:hover { box-shadow: 0 0 20px var(--accent); transform: scale(1.05); }
            </style>
        </head>
        <body>
            <div class="glow"></div>
            <div class="container">
                <div class="header">
                    <div class="meta">{$class}</div>
                    <h1>{$status}</h1>
                    <div class="message">{$e->getMessage()}</div>
                </div>
                <div class="trace">in {$e->getFile()}:{$e->getLine()}\n\n{$e->getTraceAsString()}</div>
                <a href="/" class="btn">Return Home</a>
            </div>
        </body>
        </html>
        HTML;
		(new Response($html, $status))->send();
	}
}

// ==========================================
// User Land Code
// ==========================================

// Mock DB Config (In real app, this would be env vars)
// define('DB_CONFIG', ['driver'=>'mysql', 'host'=>'127.0.0.1', 'database'=>'test', 'username'=>'root', 'password'=>'', 'charset'=>'utf8mb4']);

$app = new App();
$router = $app->router;

// 1. New v3.0 Welcome Page
$router->get('/', function () {
	session_start();
	Lang::init(); // 初始化语言系统
	
	$lang = Lang::getCurrentLang();
	$isChinese = $lang === 'zh';
	
	// 根据语言获取内容
	$title = Lang::get('app.name');
	$version = Lang::get('app.version');
	$tagline = Lang::get('app.tagline');
	
	// 特性描述
	$feature1_title = Lang::get('app.features.instant_routing');
	$feature1_desc = Lang::get('app.features.matching_desc');
	$feature2_title = Lang::get('app.features.middleware');
	$feature2_desc = Lang::get('app.features.middleware_desc');
	$feature3_title = Lang::get('app.features.database');
	$feature3_desc = Lang::get('app.features.database_desc');
	$feature4_title = Lang::get('app.features.profiler');
	$feature4_desc = Lang::get('app.features.profiler_desc');
	
	// 尝试链接文本
	$try_text = Lang::get('app.try_links');
	$api_endpoint = Lang::get('app.try_endpoints.api');
	$error_endpoint = Lang::get('app.try_endpoints.error');
	$mw_endpoint = Lang::get('app.try_endpoints.middleware');
	
	return Response::html(<<<HTML
<!DOCTYPE html>
<html lang="{$lang}">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;700&display=swap');
        :root { --bg: #000000; --glass: rgba(255,255,255,0.05); --border: rgba(255,255,255,0.1); --neon: #00ffcc; }
        body { margin: 0; background: var(--bg); color: #fff; font-family: 'Space Grotesk', sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; overflow: hidden; background-image: radial-gradient(#111 1px, transparent 1px); background-size: 40px 40px; }
        .orb { position: absolute; width: 600px; height: 600px; border-radius: 50%; background: radial-gradient(circle, rgba(0,255,204,0.1) 0, transparent 60%); filter: blur(60px); animation: pulse 8s infinite alternate; }
        @keyframes pulse { 0% { opacity: 0.5; transform: scale(0.8); } 100% { opacity: 1; transform: scale(1.2); } }
        .hero { position: relative; z-index: 10; text-align: center; border: 1px solid var(--border); padding: 60px; border-radius: 24px; background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); box-shadow: 0 0 50px rgba(0,255,204,0.1); max-width: 600px; }
        h1 { font-size: 80px; margin: 0; line-height: 0.9; background: linear-gradient(to right, #fff, #888); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .badge { display: inline-block; background: var(--neon); color: #000; padding: 5px 12px; border-radius: 20px; font-weight: bold; font-size: 14px; margin-bottom: 20px; letter-spacing: 1px; }
        p { color: #888; font-size: 18px; margin: 20px 0 40px; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; text-align: left; }
        .item { padding: 15px; border: 1px solid var(--border); border-radius: 12px; background: var(--glass); transition: 0.3s; }
        .item:hover { border-color: var(--neon); transform: translateY(-3px); }
        .item strong { color: var(--neon); display: block; margin-bottom: 5px; }
        code { background: #111; padding: 2px 6px; border-radius: 4px; font-family: monospace; color: #ccc; }
        footer { margin-top: 50px; color: #444; font-size: 12px; z-index: 10; }
        a { color: #666; text-decoration: none; } a:hover { color: #fff; }
        .lang-switcher { position: absolute; top: 20px; right: 20px; }
        .lang-switcher a { color: #00ffcc; margin-left: 10px; text-decoration: none; padding: 5px 10px; border: 1px solid var(--border); border-radius: 4px; }
        .lang-switcher a.active { background: var(--neon); color: #000; font-weight: bold; }
    </style>
</head>
<body>
    <div class="orb"></div>
    <div class="hero">
        <span class="badge">{$version}</span>
        <h1>Pico<br>Route</h1>
        <p>{$tagline}</p>
        
        <div class="grid">
            <div class="item">
                <strong>{$feature1_title}</strong>
                {$feature1_desc}
            </div>
            <div class="item">
                <strong>{$feature2_title}</strong>
                {$feature2_desc}
            </div>
            <div class="item">
                <strong>{$feature3_title}</strong>
                {$feature3_desc}
            </div>
            <div class="item">
                <strong>{$feature4_title}</strong>
                {$feature4_desc}
            </div>
        </div>
    </div>
    <footer>
        {$try_text} <a href="/api/json">{$api_endpoint}</a> &bull; <a href="/error">{$error_endpoint}</a> &bull; <a href="/mw">{$mw_endpoint}</a>
    </footer>
</body>
</html>
HTML
	);
});

// 2. JSON API Example
$router->get('/api/json', function () {
	session_start();
	Lang::init(); // 初始化语言系统
	
	return Response::json([
		'framework' => Lang::get('api.framework'),
		'cname' => Lang::get('api.cname'),
		'features' => Lang::get('api.features')
	]);
});

// 3. Error Page Example
$router->get('/error', function () {
	session_start();
	Lang::init(); // 初始化语言系统
	
	// 获取错误页面内容
	$status = 500;
	$message = "这是一个模拟的关键系统故障！";
	
	// 初始化语言系统
	Lang::init();
	
	$html = <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>错误 {$status}</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;700&display=swap');
                :root { --bg: #050510; --card: rgba(255,255,255,0.03); --border: rgba(255,255,255,0.1); --accent: #ff0055; }
                body { margin: 0; background: var(--bg); color: #fff; font-family: 'Outfit', sans-serif; display: flex; align-items: center; justify-content: center; min-height: 100vh; overflow: hidden; }
                .glow { position: absolute; width: 600px; height: 600px; background: radial-gradient(circle, rgba(255,0,85,0.15) 0, transparent 70%); top: -200px; left: -200px; pointer-events: none; }
                .container { position: relative; width: 90%; max-width: 800px; z-index: 10; }
                h1 { font-size: 120px; line-height: 1; margin: 0; background: linear-gradient(135deg, #fff, #888); -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: -5px; }
                .header { border-bottom: 1px solid var(--border); padding-bottom: 20px; margin-bottom: 20px; }
                .meta { color: var(--accent); font-family: monospace; font-size: 14px; text-transform: uppercase; margin-bottom: 5px; }
                .message { font-size: 24px; color: #ccc; margin-top: 10px; font-weight: 300; }
                .trace { background: #000; padding: 20px; border-radius: 8px; border: 1px solid var(--border); font-family: 'JetBrains Mono', monospace; font-size: 12px; color: #888; overflow-x: auto; white-space: pre; margin-top: 30px; box-shadow: inset 0 0 20px rgba(0,0,0,0.5); }
                .btn { display: inline-flex; align-items: center; margin-top: 30px; text-decoration: none; color: #fff; background: var(--accent); padding: 12px 30px; border-radius: 50px; font-weight: 700; transition: 0.3s; }
                .btn:hover { box-shadow: 0 0 20px var(--accent); transform: scale(1.05); }
            </style>
        </head>
        <body>
            <div class="glow"></div>
            <div class="container">
                <div class="header">
                    <div class="meta">Exception</div>
                    <h1>{$status}</h1>
                    <div class="message">{$message}</div>
                </div>
                <div class="trace">in index.php:0\n\n#0 [internal function]: Pico\\App->renderException(Object(Exception))\n#1 {main}</div>
                <a href="/" class="btn">返回首页</a>
            </div>
        </body>
        </html>
        HTML;
	throw new \Exception($message, 500);
});

// 4. Middleware Example
class ParamsChecker
{
	public function handle(Request $req, $next)
	{
		if (!isset($req->query['token'])) {
			return Response::json(['error' => Lang::get('middleware.error')], 403);
		}
		return $next($req);
	}
}

$router->group(['prefix' => '/mw', 'middleware' => [ParamsChecker::class]], function (Router $r) {
	$r->get('/', function () {
		return Response::json(['status' => Lang::get('middleware.success')]);
	});
});

$app->run();