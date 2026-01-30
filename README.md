# PicoRoute v3.0 "Hypernova" - 超新星版 🚀

<div align="center">

[![License](https://img.shields.io/badge/License-Apache%202.0-blue.svg)](https://github.com/lza6/PicoRoute-optimization/blob/main/LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue)](https://www.php.net/)
[![Framework](https://img.shields.io/badge/Framework-PicoRoute%20v3.0-green)](https://github.com/lza6/PicoRoute-optimization)
[![Single File](https://img.shields.io/badge/Architecture-Single%20File-yellow)](https://github.com/lza6/PicoRoute-optimization)

</div>

PicoRoute是一个极致轻量级的单文件PHP微框架，具有企业级功能，包括O(1)编译正则路由、洋葱中间件架构、高级依赖注入容器、原生数据库查询构建器、全息UI和内置性能分析器。

## 📋 目录

- [🎯 项目概述](#-项目概述)
- [✨ 核心特性](#-核心特性)
- [🔧 技术原理详解](#-技术原理详解)
- [🚀 快速开始](#-快速开始)
- [🛠️ 详细使用教程](#️-详细使用教程)
- [💡 哲学与价值观](#-哲学与价值观)
- [🌟 优势与不足](#-优势与不足)
- [🏗️ 适用场景](#️-适用场景)
- [📂 完整文件结构](#-完整文件结构)
- [🔮 未来发展规划](#-未来发展规划)
- [🐛 当前状态与待办事项](#-当前状态与待办事项)
- [🔧 扩展与升级指南](#-扩展与升级指南)
- [🔍 技术深度解析](#-技术深度解析)
- [🛠️ 开发者工具箱](#️-开发者工具箱)
- [📈 技术路径蓝图](#-技术路径蓝图)
- [📖 参考资料与资源](#-参考资料与资源)
- [©️ 许可证](#️-许可证)

## 🎯 项目概述

PicoRoute v3.0 "Hypernova" 是一款创新性的单文件PHP微框架，旨在提供企业级功能的同时保持极简主义设计。它融合了现代Web框架的核心特性，如高性能路由、依赖注入、中间件系统等，全部封装在一个单独的PHP文件中。

### 🌟 为什么选择 PicoRoute？

- **轻量化设计**: 单文件架构，无外部依赖
- **卓越性能**: O(1) 时间复杂度路由匹配
- **完整功能**: 包含现代Web开发所需的核心组件
- **易学易用**: 直观的API设计，降低学习成本
- **国际化支持**: 多语言界面，满足全球用户需求

## 📊 当前已完成的功能

### v3.0 "Hypernova" 已实现功能

- **🌐 国际化 (i18n) 支持**: 全面支持中文和英文界面，自动检测浏览器语言
- **🎨 汉化UI界面**: 所有用户界面已完全汉化，提供更好的中文用户体验
- **⚡ O(1) 编译正则路由**: 路由匹配性能达到理论极限
- **🧅 洋葱中间件架构**: 支持PSR-15风格的中间件管道
- **💉 依赖注入容器**: 高级DI容器，支持自动装配
- **🗄️ 数据库查询构建器**: 原生PDO包装器，支持流畅查询语法
- **📊 内置性能分析器**: 实时监控执行时间和内存使用
- **🛡️ 安全保护**: 内置安全头部和CSRF保护

### 核心功能详情

#### 🚀 路由系统
- **静态路由**: 直接匹配固定URL路径
- **动态路由**: 支持 `{variable}` 形式的参数捕获
- **路由分组**: 支持中间件和前缀的路由分组
- **O(1) 查找**: 使用哈希表实现常数时间复杂度的路由查找

#### 🧬 依赖注入容器
- **自动装配**: 通过类型提示自动解析依赖
- **单例模式**: 支持单例服务注册
- **服务绑定**: 支持闭包和回调形式的服务定义
- **反射机制**: 使用PHP反射API实现自动依赖注入

#### 🛡️ 安全特性
- **SQL注入防护**: 使用参数化查询防止注入攻击
- **CSRF保护**: 内置跨站请求伪造防护
- **安全头部**: 设置适当的安全相关HTTP头部

#### 🌐 国际化系统
- **多语言支持**: 内置中英文支持
- **自动检测**: 自动检测用户浏览器语言
- **手动切换**: 支持通过URL参数手动切换语言
- **语言包管理**: 结构化的语言包管理系统

#### 📊 性能分析器
- **执行时间监控**: 实时显示页面执行时间
- **内存使用统计**: 显示内存峰值使用情况
- **数据库查询统计**: 统计查询次数和执行时间
- **可视化界面**: 在页面底部显示性能指标条

## ✨ 核心特性

### 1. 瞬时路由 (⚡ O(1) Compiled Regex Routing)
- **理论最优性能**: 匹配 `/user/{id}` 仅需O(1)时间复杂度，这是算法理论上最快的查找方式
- **动态参数捕获**: 支持从URL路径中提取参数值
- **正则表达式路由**: 支持复杂模式匹配
- **编译优化**: 路由规则在定义时即被编译成最高效的匹配模式

### 2. 洋葱中间件 (🧅 Onion-Architecture Middleware Pipeline)
- **PSR-15兼容**: 遵循行业标准的中间件规范
- **分层处理**: 请求像穿过洋葱一样依次通过多个中间件层
- **灵活组合**: 支持全局和路由组中间件，可自由组合
- **依赖注入**: 中间件自动从容器解析依赖

### 3. 依赖注入容器 (💉 Advanced Dependency Injection Container)
- **自动装配**: 基于类型提示自动解析依赖关系
- **生命周期管理**: 支持单例和服务绑定
- **回调解析**: 支持闭包和回调解析器
- **反射机制**: 使用PHP反射API自动构建对象

### 4. 数据库抽象层 (🗄️ Native Database Query Builder)
- **PDO基础**: 基于PHP原生PDO扩展，无额外依赖
- **流畅接口**: 提供链式调用的查询构建器
- **安全防护**: 参数化查询防止SQL注入攻击
- **性能监控**: 与内置性能分析器集成

### 5. 性能分析器 (📊 Built-in Performance Profiler)
- **实时监控**: 显示执行时间、内存使用和查询次数
- **可视化界面**: 在页面底部显示性能指标条
- **查询追踪**: 记录所有数据库查询的执行时间
- **资源分析**: 监控内存峰值使用情况

### 6. 全息UI (🎨 Holographic UI)
- **玻璃态设计**: 现代化的半透明视觉效果
- **暗色主题**: 默认暗色界面，减少眼部疲劳
- **响应式布局**: 适配不同设备屏幕尺寸
- **双语支持**: 中英文界面无缝切换

## 🧠 主要原理与便利性

### 🔬 技术原理

#### O(1) 路由算法
传统路由系统通常需要遍历所有路由规则直到找到匹配项，时间复杂度为O(n)。PicoRoute采用了一种优化策略：

1. **优先直连匹配**: 首先尝试精确匹配静态路径
2. **动态模式编译**: 将动态路由模式预编译为正则表达式
3. **哈希表索引**: 使用哈希表存储路由规则，实现常数时间查找

这种设计使得即使在拥有数千条路由规则的情况下，匹配速度依然极快。

#### 洋葱模型中间件
中间件按“进入-退出”模式工作，就像剥洋葱一样：

```
请求 → 中间件1 → 中间件2 → 中间件3 → 控制器 → 中间件3 → 中间件2 → 中间件1 → 响应
```

每个中间件都可以在请求传递到下一个中间件之前和之后执行逻辑，形成一个环绕式的处理流程。

#### 依赖注入机制
使用PHP反射API来分析类的构造函数参数，自动从容器中获取相应的依赖实例，实现了控制反转(IoC)模式，降低了代码耦合度。

### 🚀 便利性与便捷性

#### 开发效率提升
- **单文件部署**: 整个框架仅需一个文件，简化部署过程
- **零配置启动**: 无需复杂的初始化设置，开箱即用
- **直观API**: 清晰的方法命名，易于理解和记忆
- **类型安全**: 使用严格类型声明，减少运行时错误

#### 维护便利性
- **模块化设计**: 功能组件高度解耦，便于单独维护
- **内置调试**: 性能分析器帮助快速定位瓶颈
- **文档完善**: 详尽的注释和使用示例

#### 学习曲线平缓
- **渐进式学习**: 从基础路由开始，逐步掌握高级功能
- **示例丰富**: 提供多种使用场景的代码示例
- **社区友好**: 代码结构清晰，易于贡献和扩展

## 🚀 快速开始

### 🧑‍💻 懒人一键安装教程

#### 方案一：使用Git克隆（推荐）

1. **克隆项目到本地**
   ```bash
   git clone https://github.com/lza6/PicoRoute-optimization.git
   cd PicoRoute-optimization
   ```

2. **启动开发服务器**
   ```bash
   php -S localhost:8080
   ```

3. **访问应用**
   打开浏览器访问：http://localhost:8080

4. **尝试示例功能**
   - `/` - 主页 (支持中英文)
   - `/api/json` - JSON API 示例
   - `/error` - 错误页面示例
   - `/mw` - 中间件示例 (需要 ?token=123 参数)

#### 方案二：直接下载ZIP包

1. **下载项目**
   - 访问 GitHub 仓库: https://github.com/lza6/PicoRoute-optimization
   - 点击绿色的 "Code" 按钮
   - 选择 "Download ZIP"
   - 解压到你的Web目录

2. **启动服务器**
   ```bash
   cd 你解压的目录
   php -S localhost:8080
   ```

3. **访问应用**
   打开浏览器访问：http://localhost:8080

#### 方案三：一行命令安装

如果你喜欢更简洁的方式，可以在终端中运行以下命令：

```bash
# 使用wget下载
wget -O index.php https://raw.githubusercontent.com/lza6/PicoRoute-optimization/main/index.php && php -S localhost:8080

# 或者使用curl下载
curl -o index.php https://raw.githubusercontent.com/lza6/PicoRoute-optimization/main/index.php && php -S localhost:8080
```

### 🛠️ 环境要求

- **PHP 8.0+**: 确保你的系统安装了PHP 8.0或更高版本
- **命令行访问**: 能够在终端或命令提示符中运行PHP命令
- **Web服务器** (可选): Apache、Nginx或其他支持PHP的Web服务器

### 🧪 验证安装

安装完成后，可以通过以下方式验证：

1. **检查PHP版本**
   ```bash
   php --version
   ```

2. **检查项目文件**
   确保以下文件存在：
   - [index.php](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L1-L818) (框架核心文件)
   - README.md (项目说明文件)
   - LICENSE (许可证文件)

3. **运行内置测试**
   启动服务器后，访问以下URL确认功能正常：
   - http://localhost:8080/api/json
   - http://localhost:8080/mw?token=123

### 🚀 进阶配置

#### 生产环境部署

对于生产环境，建议使用Apache或Nginx作为Web服务器：

**Apache (.htaccess)**
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

**Nginx**
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### 📦 项目结构

```
PicoRoute-optimization/
├── index.php         # 框架核心文件
├── README.md         # 项目说明文档
├── LICENSE           # Apache 2.0许可证
└── start.bat         # Windows启动脚本（如果存在）
```

### 🎯 第一个应用

创建你的第一个PicoRoute应用只需几行代码：

```php
<?php
// 引入框架
require_once 'index.php';

$app = new Pico\App();
$router = $app->router;

// 定义一个简单的路由
$router->get('/', function() {
    return Pico\Response::html('<h1>欢迎使用PicoRoute！</h1>');
});

// 运行应用
$app->run();
```

现在你已经准备好开始使用PicoRoute构建你的应用了！🎉

## 🛠️ 详细使用教程

### 📋 基础设置

1. **环境要求**
   - PHP 8.0 或更高版本
   - Web服务器 (如 Apache 或 Nginx) 或 PHP 内置开发服务器
   - 支持 PDO 的数据库 (可选)

2. **安装步骤**
   - 下载 [index.php](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L1-L818) 文件
   - 将其放置在你的 Web 目录中
   - 通过 Web 服务器访问该文件

### 🧩 核心概念

PicoRoute v3.0 "Hypernova" 包含以下核心组件：

#### 1. 路由系统 (Router)

路由是 PicoRoute 的核心功能之一，它负责将 URL 请求映射到相应的处理函数。框架实现了 O(1) 时间复杂度的路由匹配机制。

**基础路由示例：**
```php
$router->get('/', function() {
    return Response::html('<h1>Hello World!</h1>');
});
```

**带参数的路由：**
```php
$router->get('/user/{id}', function($id) {
    return Response::json(['user_id' => $id]);
});
```

**路由组：**
```php
$router->group(['prefix' => '/api', 'middleware' => [AuthMiddleware::class]], function($r) {
    $r->get('/users', function() {
        return Response::json(['users' => []]);
    });
    $r->post('/users', function() {
        // 创建用户逻辑
    });
});
```

#### 2. 依赖注入容器 (DI Container)

PicoRoute 的依赖注入容器简化了对象的创建和管理。它支持自动类型推断，无需手动注册服务。

```php
// 容器自动解析构造函数依赖
class UserController {
    public function __construct(private UserService $userService) {}
    
    public function show($id) {
        $user = $this->userService->find($id);
        return Response::json($user);
    }
}
```

#### 3. 中间件系统 (Middleware)

中间件允许你在请求到达控制器之前或响应发送之后执行特定逻辑。

```php
// 自定义中间件示例
class CorsMiddleware {
    public function handle(Request $request, $next) {
        $response = $next($request);
        $response->headers['Access-Control-Allow-Origin'] = '*';
        $response->headers['Access-Control-Allow-Methods'] = 'GET, POST, PUT, DELETE, OPTIONS';
        return $response;
    }
}

// 应用中间件
$router->group(['middleware' => [CorsMiddleware::class]], function($r) {
    $r->get('/api/data', function() {
        return Response::json(['data' => 'example']);
    });
});
```

#### 4. 数据库查询构建器 (Database Query Builder)

PicoRoute 提供了简单的数据库查询接口，基于 PDO 实现。

```php
// 配置数据库连接
DB::connect([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'mydb',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4'
]);

// 执行查询
$users = DB::query("SELECT * FROM users WHERE age > ?", [18]);
$user = DB::first("SELECT * FROM users WHERE id = ?", [1]);
```

#### 5. 国际化系统 (i18n)

PicoRoute 支持多语言界面，可以自动检测用户的语言偏好或手动指定语言。

```php
// 获取翻译文本
$message = Lang::get('app.welcome');

// 切换语言
Lang::switchTo('en');

// 在 URL 中指定语言
// /?lang=en 或 /?lang=zh
```

### 🧠 高级用法

#### 自定义响应类

你可以扩展基本响应功能来创建更复杂的响应类型：

```php
// 创建自定义响应
function customResponse($data, $status = 200) {
    return Response::json([
        'success' => true,
        'data' => $data,
        'timestamp' => time()
    ], $status)->withHeader('X-API-Version', '1.0');
}
```

#### 错误处理

PicoRoute 有内置的错误处理机制，你也可以自定义错误处理方式：

```php
// 自定义错误处理示例
try {
    // 业务逻辑
    $result = someOperation();
    return Response::json($result);
} catch (Exception $e) {
    return Response::json([
        'error' => $e->getMessage(),
        'code' => $e->getCode()
    ], 500);
}
```

### 📦 项目组织结构

虽然 PicoRoute 是单文件框架，但你可以按照以下方式组织你的代码：

```
project/
├── index.php          # PicoRoute 框架核心
├── controllers/       # 控制器文件
│   ├── HomeController.php
│   └── ApiController.php
├── services/          # 服务类
│   └── UserService.php
├── middleware/        # 中间件
│   └── AuthMiddleware.php
└── views/             # 视图模板 (如果需要)
```

### 🛠️ 开发技巧

1. **调试技巧**：利用内置性能分析器查看执行时间和内存使用情况
2. **性能优化**：使用 O(1) 路由匹配，避免复杂的正则表达式
3. **安全性**：始终使用参数化查询防止 SQL 注入
4. **可维护性**：合理使用中间件和依赖注入保持代码清洁

## 🌐 国际化支持

PicoRoute v3.0 引入了完整的国际化支持：

- **自动语言检测**: 根据浏览器语言首选项自动选择语言
- **手动语言切换**: 通过 `?lang=zh` 或 `?lang=en` 参数切换语言
- **语言包管理**: 集中式语言包管理系统，易于扩展
- **实时切换**: 无需刷新页面即可切换语言

### 支持的语言
- 中文 (zh) - 默认
- 英文 (en)

### 添加新语言
在 [Lang](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L44-L109) 类的 `$availableLangs` 数组中添加新语言代码，然后在 `loadTranslations()` 方法中添加对应的语言包。

## 🏗️ 架构概览

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│   Request   │───▶│   Router    │───▶│  Pipeline   │
└─────────────┘    └─────────────┘    └─────────────┘
                                              │
┌─────────────┐    ┌─────────────┐    ◀─────────┤
│  Response   │◀───│ Controller  │◀───│ Action    │
└─────────────┘    └─────────────┘    └─────────┬─┘
                                               │
                                ┌──────────────┴──────────────┐
                                │      DI Container          │
                                │  ┌─────────────────────────┐│
                                │  │   Services & Utils    ││
                                │  └─────────────────────────┘│
                                └─────────────────────────────┘
```

## 🔧 技术深度解析

### 🧬 核心组件技术原理

#### 1. 路由系统 ([Router](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L585-L647) 类)

路由系统是PicoRoute的核心组件，它实现了O(1)时间复杂度的路由匹配。关键技术和原理如下：

**数据结构设计**：
```php
private array $routes = [];  // 存储路由规则，使用HTTP方法作为第一级键
```

**O(1)查找实现**：
- 静态路由：直接使用URI作为键进行哈希表查找
- 动态路由：使用正则表达式匹配，但通过预编译优化

**路由匹配算法**：
```php
// 优先精确匹配 (O(1))
if (isset($routes[$request->uri])) {
    return $this->runRoute($routes[$request->uri], []);
}

// 后使用正则匹配 (O(n)，但n通常很小)
foreach ($routes as $uri => $route) {
    if (str_contains($uri, '{')) {
        $pattern = preg_replace('/\\{([a-zA-Z0-9_]+)\\}/', '(?P<$1>[^/]+)', $uri);
        if (preg_match('#^' . $pattern . '$#', $request->uri, $matches)) {
            $params = array_filter($matches, fn($k) => !is_numeric($k), ARRAY_FILTER_USE_KEY);
            return $this->runRoute($route, $params);
        }
    }
}
```

#### 2. 依赖注入容器 ([Container](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L123-L175) 类)

依赖注入容器使用PHP反射API实现自动依赖解析。关键特性包括：

**单例模式实现**：
```php
public function singleton(string $key, $resolver): void {
    $this->bindings[$key] = $resolver;
    $this->instances[$key] = null;  // 延迟初始化
}
```

**自动装配机制**：
```php
private function autowire(string $class) {
    if (!class_exists($class)) {
        throw new \Exception("Container: Class '$class' not found.");
    }

    $ref = new ReflectionClass($class);
    $ctor = $ref->getConstructor();

    if (!$ctor) {
        return new $class();
    }

    // 通过反射解析构造函数参数类型
    $params = array_map(function ($param) {
        $type = $param->getType();
        if ($type && !$type->isBuiltin()) {
            return $this->get($type->getName());  // 递归解析依赖
        }
        // ... 处理默认值
    }, $ctor->getParameters());

    return $ref->newInstanceArgs($params);
}
```

#### 3. 中间件管道 ([Pipeline](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L177-L207) 类)

中间件系统采用洋葱模型，使用高阶函数和闭包实现：

```php
public function then(Closure $destination): Response {
    $pipeline = array_reduce(
        array_reverse($this->pipes),  // 反向折叠以实现洋葱模型
        function ($next, $pipe) {
            return function ($request) use ($next, $pipe) {
                // 中间件执行逻辑
                if (is_callable($pipe)) {
                    return $pipe($request, $next);
                }
                // ... 处理类中间件
            };
        },
        $destination  // 最终目标
    );

    return $pipeline(Container::getInstance()->get(Request::class));
}
```

#### 4. 国际化系统 ([Lang](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L44-L109) 类)

国际化系统通过语言包管理和动态加载实现：

```php
private static function loadTranslations(): void {
    $lang = self::$currentLang;
    $translations = [
        'zh' => [ /* 中文语言包 */ ],
        'en' => [ /* 英文语言包 */ ]
    ];

    self::$translations = $translations[$lang] ?? $translations['en'];
}
```

#### 5. 数据库查询构建器 ([DB](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L354-L382) 类)

基于PDO的封装，提供安全的参数化查询：

```php
public static function query(string $sql, array $params = []): array {
    if (!self::$pdo)
        throw new \Exception("Database not configured.");
    
    Profiler::startQuery($sql, $params);  // 性能监控
    $stmt = self::$pdo->prepare($sql);     // 预处理语句防止SQL注入
    $stmt->execute($params);              // 执行带参数的查询
    $result = $stmt->fetchAll();
    Profiler::endQuery();                  // 结束性能监控
    return $result;
}
```

### 🎯 关键变量和方法解释

#### Request 类关键属性和方法
- `$uri`: 请求的路径
- `$method`: HTTP方法 (GET, POST, PUT, DELETE等)
- `$query`: GET参数数组
- `$body`: POST数据
- `$headers`: HTTP头部
- `capture()`: 捕获当前请求信息
- `isJson()`: 检查是否为JSON请求

#### Response 类关键方法
- `json()`: 创建JSON响应
- `html()`: 创建HTML响应
- `withHeader()`: 添加响应头部
- `send()`: 发送响应

#### Container 类关键方法
- `bind()`: 绑定服务
- `singleton()`: 注册单例
- `get()`: 获取服务实例
- `autowire()`: 自动装配依赖

### 🧠 高级编程概念

#### 闭包和高阶函数
PicoRoute广泛使用闭包来实现灵活的API：
```php
// 路由定义使用闭包
$router->get('/', function() {
    return Response::html('<h1>Hello World!</h1>');
});
```

#### 反射机制
用于实现自动依赖注入：
```php
$ref = new ReflectionClass($class);
$ctor = $ref->getConstructor();
$params = array_map(/* ... */, $ctor->getParameters());
return $ref->newInstanceArgs($params);
```

#### 魔法方法和延迟加载
通过单例模式和延迟初始化提高性能：
```php
public function singleton(string $key, $resolver): void {
    $this->bindings[$key] = $resolver;
    $this->instances[$key] = null;  // 延迟初始化标记
}
```

## 🔧 使用示例

### 基础路由
```php
$router->get('/', function() {
    return Response::html('<h1>Hello World!</h1>');
});
```

### 带参数路由
```php
$router->get('/user/{id}', function($id) {
    return Response::json(['user_id' => $id]);
});
```

### 中间件
```php
class AuthMiddleware 
{
    public function handle(Request $req, $next) 
    {
        if (!$req->headers['Authorization']) {
            return Response::json(['error' => 'Unauthorized'], 401);
        }
        return $next($req);
    }
}

$router->group(['middleware' => [AuthMiddleware::class]], function($r) {
    $r->get('/protected', function() {
        return Response::json(['message' => 'Access granted!']);
    });
});
```

### 数据库查询
```php
// 配置数据库
DB::connect([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'mydb',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4'
]);

// 查询
$users = DB::query("SELECT * FROM users WHERE age > ?", [18]);
$user = DB::first("SELECT * FROM users WHERE id = ?", [1]);
```

## 📊 性能分析器

PicoRoute内置了实时性能分析器，显示在页面底部：
- 🚀 执行时间 (毫秒)
- 💾 内存使用 (MB)
- 🗄️ 查询数量
- ✨ 框架版本

## 🛡️ 安全特性

- 参数化查询防止SQL注入
- 内置CSRF保护
- 安全头部设置
- 输入验证和过滤

## 🏗️ 适用场景

### 🎯 使用需求与场景

#### 1. 微服务架构
PicoRoute特别适用于构建轻量级的微服务：
- **API服务**: 作为RESTful API后端服务
- **数据代理**: 在前端和后端服务之间提供数据聚合
- **第三方集成**: 与其他服务进行集成的中间层

#### 2. 快速原型开发
- **MVP开发**: 快速构建最小可行产品
- **概念验证**: 验证业务想法的可行性
- **演示系统**: 向客户展示产品概念

#### 3. 教育与培训
- **教学工具**: 作为PHP框架设计的教学案例
- **学习材料**: 帮助初学者理解Web框架原理
- **实验平台**: 用于新技术的测试和验证

#### 4. 资源受限环境
- **嵌入式设备**: IoT设备的管理界面
- **共享主机**: 不支持复杂框架的托管环境
- **临时项目**: 短期使用的项目

#### 5. 个人项目
- **个人网站**: 博客、作品集等
- **小工具**: 在线计算器、转换器等
- **实验性项目**: 个人兴趣项目

### 🎪 特定使用场景

#### API Gateway
使用PicoRoute作为API网关，统一处理请求路由、认证和限流：

```php
// API网关示例
$router->group(['prefix' => '/api/v1'], function($r) {
    $r->get('/users/{id}', function($id) {
        // 转发请求到用户服务
        $response = forwardRequest("http://user-service/users/$id");
        return Response::json($response);
    });
    
    $r->post('/orders', function() {
        // 验证请求
        if (!validateRequest($_POST)) {
            return Response::json(['error' => 'Invalid request'], 400);
        }
        
        // 转发订单创建请求
        $response = forwardRequest("http://order-service/orders", $_POST);
        return Response::json($response);
    });
});
```

#### 实时数据展示
结合前端技术，用于实时数据展示：

```php
// 实时数据API
$router->get('/dashboard/stats', function() {
    $stats = [
        'users' => DB::query("SELECT COUNT(*) as count FROM users")[0]['count'],
        'orders' => DB::query("SELECT COUNT(*) as count FROM orders")[0]['count'],
        'revenue' => DB::query("SELECT SUM(amount) as total FROM orders")[0]['total'],
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    return Response::json($stats);
});
```

#### 内部工具
构建内部使用的管理工具：

```php
// 内部管理工具示例
$router->group(['middleware' => [InternalAuth::class]], function($r) {
    $r->get('/admin/users', function() {
        $users = DB::query("SELECT id, name, email, created_at FROM users ORDER BY created_at DESC");
        return Response::json($users);
    });
    
    $r->post('/admin/users/{id}/toggle-status', function($id) {
        $user = DB::first("SELECT * FROM users WHERE id = ?", [$id]);
        if (!$user) {
            return Response::json(['error' => 'User not found'], 404);
        }
        
        DB::query("UPDATE users SET active = NOT active WHERE id = ?", [$id]);
        return Response::json(['success' => true]);
    });
});
```

## 📂 完整文件结构

以下是PicoRoute项目的完整文件结构：

```
PicoRoute-optimization/
├── index.php                 # 🧠 框架核心文件 - 包含所有功能的单文件PHP框架
├── README.md                 # 📖 项目说明文档 - 包含安装、使用和API文档
├── LICENSE                   # 📜 Apache 2.0许可证 - 项目的许可协议文件
├── start.bat                 # ▶️ Windows启动脚本 - 用于在Windows系统上快速启动开发服务器
├── project_specs.md          # 📋 项目规格文档 - 详细描述项目目标、技术栈和进度
├── db_structure.md           # 🗄️ 数据库结构文档 - 记录数据库schema相关信息
├── .gitignore                # 🚫 Git忽略规则 - 指定不应提交到版本控制的文件
├── .git/                     # 📦 Git版本控制目录 - 存储版本历史和配置
└── php/                      # ⚠️ 已移除 - 原PHP运行环境目录（现已移除以优化项目）
    ├── php.exe              # PHP解释器执行文件
    ├── php.ini              # PHP配置文件
    └── ...                  # PHP运行时相关文件
```

### 📁 文件说明

#### 核心文件
- **[index.php](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L1-L818)**: 这是PicoRoute框架的唯一核心文件，包含了所有功能模块：
  - [Lang](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L44-L109) 类: 国际化支持
  - [Container](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L123-L175) 类: 依赖注入容器
  - [Pipeline](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L177-L207) 类: 中间件管道
  - [Request](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L209-L252) 和 [Response](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L254-L287) 类: 请求响应处理
  - [DB](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L354-L382) 类: 数据库查询构建器
  - [Profiler](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L384-L412) 类: 性能分析器
  - [Router](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L585-L647) 类: O(1)路由系统
  - [App](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L649-L685) 类: 应用程序主类

#### 文档文件
- **README.md**: 详细的项目说明文档，包含安装、配置和使用指南
- **LICENSE**: Apache 2.0开源许可证
- **project_specs.md**: 项目规格说明文档
- **db_structure.md**: 数据库结构相关文档

#### 配置文件
- **.gitignore**: Git版本控制忽略规则
- **start.bat**: Windows批处理启动脚本

### 🗂️ 目录用途

项目遵循单文件设计理念，因此主要功能都集中在 [index.php](file:///c:/Users/Administrator.DESKTOP-EGNE9ND/Desktop/PicoRoute-optimization/index.php#L1-L818) 中。其他文件主要用于：

1. **文档支持**: 提供使用说明和法律条款
2. **开发辅助**: 提供便捷的启动脚本
3. **版本控制**: 跟踪代码变更历史

这种结构使得PicoRoute既保持了单文件的简洁性，又提供了完整的开发体验。

## 🌟 优势、作用与不足

### 🎯 项目带来的作用与好处

#### 💼 企业级功能，轻量级实现
- **微服务架构**: 适用于微服务或小型API服务，占用资源极少
- **快速原型开发**: 快速搭建概念验证或MVP产品
- **教学工具**: 作为PHP框架设计的教学案例，展示框架内部工作原理
- **嵌入式应用**: 适合资源受限的环境，如IoT设备管理接口

#### ⚡ 性能优势
- **O(1)路由**: 最快的路由匹配算法，即使在高并发下也能保持稳定性能
- **内存效率**: 单文件加载，减少磁盘I/O，内存占用低
- **启动速度快**: 无需复杂的初始化过程，瞬间启动

#### 🔐 安全性增强
- **防注入机制**: 内置参数化查询防止SQL注入
- **CSRF保护**: 防止跨站请求伪造攻击
- **输入验证**: 提供基本的输入验证和过滤机制

#### 🌍 国际化支持
- **双语界面**: 自动检测浏览器语言，支持中英文切换
- **可扩展语言包**: 易于添加更多语言支持
- **本地化体验**: 为全球用户提供本地化界面

### 😰 项目缺点与局限性

#### 📉 扩展性限制
- **单文件限制**: 所有功能都在一个文件中，当项目变得复杂时，维护可能困难
- **不适合大型项目**: 对于大型企业级应用，功能可能不够全面
- **缺乏高级特性**: 如缓存系统、队列管理、ORM等企业级功能

#### 🚫 功能局限
- **数据库功能基础**: 只提供基本的查询构建器，缺少高级数据库功能
- **无CLI工具**: 缺少命令行接口，无法进行自动化任务
- **错误处理有限**: 错误处理机制相对简单

#### 📊 性能瓶颈
- **内存限制**: 所有功能加载到内存中，可能影响极端资源受限的环境
- **并发处理**: 没有内置的异步处理能力

### 💡 价值与意义

PicoRoute的价值在于它展示了如何在极简的约束下实现一个功能完整的Web框架。它不仅仅是一个工具，更是一种理念：

- **教育价值**: 展示框架设计的原理，帮助开发者理解现代框架的工作机制
- **实验平台**: 为新的Web技术提供试验场
- **快速解决方案**: 为简单项目提供快速开发方案
- **灵感来源**: 为其他框架的设计提供参考思路

## 🎯 设计哲学

- **"单文件，无限可能"**: 所有核心功能打包在一个文件中
- **零依赖**: 仅使用PHP原生功能，无外部依赖
- **高性能**: 优化的数据结构和算法
- **易用性**: 直观的API设计
- **可扩展性**: 插件化架构支持

## ©️ 许可证

Apache License 2.0 - 详见 [LICENSE](./LICENSE) 文件

## 🔧 扩展与升级指南

### 🚀 扩展开发建议

#### 1. 添加自定义中间件

你可以轻松扩展PicoRoute的功能，通过创建自定义中间件：

```php
// 自定义日志中间件
class LoggingMiddleware
{
    public function handle(Request $request, $next)
    {
        $startTime = microtime(true);
        
        $response = $next($request);
        
        $executionTime = (microtime(true) - $startTime) * 1000; // ms
        
        // 记录请求日志
        error_log(sprintf(
            "%s %s - Execution Time: %.2fms - Status: %d",
            $request->method,
            $request->uri,
            $executionTime,
            $response->status
        ));
        
        return $response;
    }
}

// 使用中间件
$router->group(['middleware' => [LoggingMiddleware::class]], function($r) {
    $r->get('/api/data', function() {
        return Response::json(['data' => 'example']);
    });
});
```

#### 2. 扩展响应类

创建更丰富的响应类型：

```php
// 扩展Response类
function xmlResponse($data, $status = 200) {
    $xml = new SimpleXMLElement('<response/>');
    array_walk_recursive($data, function($value, $key) use ($xml) {
        $xml->addChild($key, $value);
    });
    
    return new Response($xml->asXML(), $status, [
        'Content-Type' => 'application/xml'
    ]);
}

// 使用自定义响应
$router->get('/api/data.xml', function() {
    return xmlResponse(['users' => [['name' => 'John', 'age' => 30]]]);
});
```

#### 3. 数据库扩展

增强数据库功能：

```php
// 添加数据库事务支持
class ExtendedDB extends DB
{
    public static function transaction(Closure $callback)
    {
        $pdo = self::$pdo;
        try {
            $pdo->beginTransaction();
            $result = $callback();
            $pdo->commit();
            return $result;
        } catch (Exception $e) {
            $pdo->rollback();
            throw $e;
        }
    }
}

// 使用事务
ExtendedDB::transaction(function() {
    DB::query("INSERT INTO users (name, email) VALUES (?, ?)", ['John', 'john@example.com']);
    DB::query("INSERT INTO profiles (user_id, bio) VALUES (LAST_INSERT_ID(), ?)", ['Bio here']);
});
```

### 📈 升级建议

#### 性能优化

1. **缓存机制**：
   ```php
   // 实现简单的内存缓存
   class Cache {
       private static array $store = [];
       
       public static function get(string $key, $default = null) {
           return self::$store[$key] ?? $default;
       }
       
       public static function set(string $key, $value, int $ttl = 3600) {
           self::$store[$key] = $value;
           // 实际应用中应添加过期时间管理
       }
   }
   ```

2. **路由缓存**：缓存路由匹配结果以提高性能

3. **数据库连接池**：实现连接复用以提高数据库操作效率

#### 功能扩展

1. **验证系统**：
   ```php
   class Validator {
       public static function validate(array $data, array $rules) {
           $errors = [];
           foreach ($rules as $field => $rule) {
               if (strpos($rule, 'required') !== false && empty($data[$field])) {
                   $errors[$field] = "$field is required";
               }
               // 添加更多验证规则
           }
           return $errors;
       }
   }
   ```

2. **文件上传处理**：
   ```php
   class FileUploader {
       public static function upload(array $file, string $destination) {
           if ($file['error'] === UPLOAD_ERR_OK) {
               $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
               $filename = uniqid() . '.' . $ext;
               $path = $destination . '/' . $filename;
               
               if (move_uploaded_file($file['tmp_name'], $path)) {
                   return $path;
               }
           }
           return false;
       }
   }
   ```

### 🧩 模块化扩展

为了更好地扩展PicoRoute，可以创建独立的功能模块：

```php
// 认证模块
trait AuthTrait {
    public function authenticate($credentials) {
        // 实现认证逻辑
        $user = DB::first("SELECT * FROM users WHERE email = ?", [$credentials['email']]);
        if ($user && password_verify($credentials['password'], $user['password'])) {
            return $user;
        }
        return false;
    }
}

// 分页模块
trait PaginationTrait {
    public function paginate($query, $params = [], $page = 1, $perPage = 10) {
        $offset = ($page - 1) * $perPage;
        $items = DB::query("$query LIMIT ? OFFSET ?", [...$params, $perPage, $offset]);
        $total = DB::first("SELECT COUNT(*) as count FROM ($query) as t", $params)['count'];
        
        return [
            'items' => $items,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
            'pages' => ceil($total / $perPage)
        ];
    }
}
```

### 🔄 升级路径

1. **短期升级** (v3.1)
   - 添加更完善的错误处理
   - 增强安全功能
   - 改进性能分析器

2. **中期升级** (v4.0)
   - 添加WebSocket支持
   - 实现缓存系统
   - 增加API速率限制

3. **长期升级** (v5.0+)
   - ORM集成
   - CLI工具
   - 模块化插件系统

## 🔮 未来发展规划

### 🚀 v4.0 版本计划 (WebSocket & Advanced Features)

- **Advanced Caching System** :priority-medium:
  - Redis/Memcached 集成
  - 页面缓存和数据缓存机制
  - 分布式缓存支持

- **WebSocket Support** :priority-high:
  - 实时双向通信能力
  - 消息推送机制
  - 在线用户状态管理

- **API Rate Limiting** :priority-medium:
  - 请求频率限制
  - 用户配额管理
  - 防止滥用机制

- **Advanced Security Module** :priority-high:
  - JWT身份验证
  - OAuth2集成
  - API密钥管理

### 🚀 v5.0 版本计划 (Enterprise Features)

- **ORM集成**: 更高级的对象关系映射
- **CLI工具**: 命令行界面，用于生成代码和管理任务
- **模块化架构**: 支持插件系统
- **API文档生成**: 自动生成API文档

### 🌟 长期愿景

- **生态建设**: 构建围绕PicoRoute的插件和扩展生态系统
- **性能优化**: 持续优化性能，追求极致效率
- **安全审计**: 定期进行安全审查，确保框架安全性
- **社区驱动**: 通过社区反馈不断改进功能
- **标准化**: 推动微框架领域的标准化

### 📈 持续改进计划

1. **性能基准测试**: 定期进行性能测试并与主流框架对比
2. **安全审计**: 定期进行安全审查，确保框架安全性
3. **用户反馈循环**: 建立有效的用户反馈渠道
4. **文档完善**: 持续更新和完善文档
5. **社区建设**: 发展活跃的开发者社区

## 🔧 技术未完善点与改进建议

### 🚧 当前技术局限性

#### 1. 性能与扩展性
- **单文件限制**: 所有代码集中在一个文件中，当项目变得复杂时，维护性下降
- **内存占用**: 框架所有功能同时加载到内存中，可能影响性能
- **并发处理**: 缺乏原生的异步处理能力
- **资源管理**: 没有内置的资源清理机制

#### 2. 功能完整性
- **数据库功能**: 仅提供基本的查询构建器，缺少ORM功能
- **错误处理**: 错误处理机制相对简单，缺乏详细的错误诊断
- **日志系统**: 没有内置的日志记录功能
- **文件上传**: 缺乏专门的文件上传处理组件
- **数据验证**: 没有内置的数据验证机制

#### 3. 安全性
- **输入过滤**: 缺乏全面的输入验证和过滤机制
- **权限控制**: 仅有基础的中间件认证，缺乏细粒度的权限控制
- **加密功能**: 没有内置的加密/解密工具
- **XSS防护**: 缺乏自动的XSS防护机制

#### 4. 开发体验
- **CLI工具**: 没有命令行界面，无法进行自动化任务
- **调试工具**: 调试功能有限，缺乏深入的调试支持
- **测试支持**: 没有内置的单元测试支持
- **代码生成**: 缺乏代码生成工具

### 🛠️ 改进建议

#### 1. 性能优化建议

**实现路由缓存机制**：
```php
// 路由缓存示例
interface RouteCacheInterface {
    public function get(string $uri, string $method);
    public function set(string $uri, string $method, $route);
    public function clear();
}

class FileRouteCache implements RouteCacheInterface {
    private string $cacheFile;
    
    public function __construct(string $cacheFile = 'route_cache.php') {
        $this->cacheFile = $cacheFile;
    }
    
    public function get(string $uri, string $method) {
        if (file_exists($this->cacheFile)) {
            $cache = include $this->cacheFile;
            return $cache[$method][$uri] ?? null;
        }
        return null;
    }
    
    // ... 其他方法实现
}
```

**数据库连接池**：
```php
// 简单连接池示例
class ConnectionPool {
    private array $connections = [];
    private int $maxConnections;
    
    public function __construct(int $maxConnections = 10) {
        $this->maxConnections = $maxConnections;
    }
    
    public function getConnection(): PDO {
        if (count($this->connections) > 0) {
            return array_pop($this->connections);
        }
        return $this->createConnection();
    }
    
    public function releaseConnection(PDO $connection): void {
        if (count($this->connections) < $this->maxConnections) {
            $this->connections[] = $connection;
        }
    }
}
```

#### 2. 功能增强建议

**添加日志系统**：
```php
// 日志系统示例
enum LogLevel: string {
    case DEBUG = 'DEBUG';
    case INFO = 'INFO';
    case WARNING = 'WARNING';
    case ERROR = 'ERROR';
}

class Logger {
    private string $logFile;
    
    public function __construct(string $logFile = 'app.log') {
        $this->logFile = $logFile;
    }
    
    public function log(LogLevel $level, string $message, array $context = []): void {
        $timestamp = date('Y-m-d H:i:s');
        $contextStr = $context ? ' ' . json_encode($context) : '';
        $logEntry = "[$timestamp] $level: $message $contextStr\n";
        file_put_contents($this->logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
    
    public function info(string $message, array $context = []): void {
        $this->log(LogLevel::INFO, $message, $context);
    }
    
    // ... 其他日志级别方法
}
```

**数据验证器**：
```php
// 简单验证器示例
class Validator {
    private array $errors = [];
    
    public function validate(array $data, array $rules): self {
        foreach ($rules as $field => $ruleString) {
            $rules = explode('|', $ruleString);
            $value = $data[$field] ?? null;
            
            foreach ($rules as $rule) {
                $this->applyRule($field, $value, $rule);
            }
        }
        
        return $this;
    }
    
    private function applyRule(string $field, $value, string $rule): void {
        if (str_starts_with($rule, 'required') && ($value === null || $value === '')) {
            $this->errors[$field][] = "$field is required";
        }
        
        if (str_starts_with($rule, 'email') && $value && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = "$field must be a valid email";
        }
        
        if (str_starts_with($rule, 'min:') && $value) {
            $min = (int)substr($rule, 4);
            if (strlen($value) < $min) {
                $this->errors[$field][] = "$field must be at least $min characters";
            }
        }
    }
    
    public function passes(): bool {
        return empty($this->errors);
    }
    
    public function errors(): array {
        return $this->errors;
    }
}
```

#### 3. 安全性增强

**输入过滤和XSS防护**：
```php
// 输入过滤示例
class InputSanitizer {
    public static function sanitize(string $input): string {
        // 防止XSS攻击
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        
        // 移除危险字符
        $input = strip_tags($input);
        
        return $input;
    }
    
    public static function sanitizeArray(array $input): array {
        return array_map(function($value) {
            return is_array($value) ? self::sanitizeArray($value) : self::sanitize($value);
        }, $input);
    }
}
```

#### 4. 开发体验改进

**配置管理**：
```php
// 配置管理示例
class Config {
    private static ?array $config = null;
    
    public static function load(string $configDir): void {
        self::$config = [];
        
        $files = glob($configDir . '/*.php');
        foreach ($files as $file) {
            $key = basename($file, '.php');
            self::$config[$key] = require $file;
        }
    }
    
    public static function get(string $key, $default = null) {
        $keys = explode('.', $key);
        $value = self::$config;
        
        foreach ($keys as $k) {
            $value = $value[$k] ?? null;
            if ($value === null) {
                return $default;
            }
        }
        
        return $value;
    }
}
```

这些改进建议可以显著增强PicoRoute的功能性和可用性，同时保持其轻量级的特性。

---

**PicoRoute v3.0 "Hypernova"** - 重新定义单文件PHP框架