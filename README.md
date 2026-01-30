# 🚀 PicoRoute v3.0 "Hypernova" - 超新星版

<div align="center">

[![License](https://img.shields.io/badge/License-Apache%202.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)
[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![Framework](https://img.shields.io/badge/Framework-PicoRoute%20v3.0-00d2ff)](https://github.com/lza6/PicoRoute-optimization)
[![Single File](https://img.shields.io/badge/Architecture-Single%20File-yellow)](https://github.com/lza6/PicoRoute-optimization)
[![Stars](https://img.shields.io/github/stars/lza6/PicoRoute-optimization?style=social)](https://github.com/lza6/PicoRoute-optimization)

**✨ 重新定义单文件PHP框架 ✨**

[🌐 在线演示](https://github.com/lza6/PicoRoute-optimization) • [📖 文档](#-详细文档) • [🚀 快速开始](#-懒人一键安装) • [💡 示例](#-使用示例)

</div>

---

## 🎯 项目概述

> **"单文件，无限可能"** —— 这是PicoRoute的核心理念 🌟

**PicoRoute v3.0 "Hypernova"** 是一款创新性的**单文件PHP微框架**，它将企业级功能与极简主义设计完美融合。想象一下：一个文件，零依赖，却拥有现代Web框架的所有核心特性！

### 🌈 为什么选择 PicoRoute？

| 特性 | 传统框架 | PicoRoute |
|------|---------|-----------|
| 文件数量 | 数百个文件 | **1个文件** 📄 |
| 依赖管理 | Composer必需 | **零依赖** 🎯 |
| 部署难度 | 复杂配置 | **即插即用** ⚡ |
| 学习曲线 | 陡峭 | **平缓友好** 🌱 |
| 性能表现 | 一般 | **O(1)路由** 🚀 |

---

## ✨ 核心特性

### ⚡ 1. O(1) 编译正则路由
```
理论最优性能！匹配 /user/{id} 仅需常数时间
```
- **哈希表索引**：静态路由直接哈希查找
- **预编译优化**：动态路由正则预编译
- **参数捕获**：支持 `{variable}` 形式动态参数

### 🧅 2. 洋葱中间件架构
```
请求 → 中间件1 → 中间件2 → 控制器 → 中间件2 → 中间件1 → 响应
```
- **PSR-15兼容**：遵循行业标准
- **洋葱模型**：分层处理，环绕式流程
- **灵活组合**：支持全局和路由组中间件

### 💉 3. 高级依赖注入容器
- **自动装配**：通过类型提示自动解析依赖
- **单例模式**：支持单例服务注册
- **反射机制**：使用PHP反射API实现IoC

### 🗄️ 4. 原生数据库查询构建器
- **PDO基础**：基于PHP原生PDO，无额外依赖
- **参数化查询**：防止SQL注入攻击
- **性能监控**：与内置分析器集成

### 🌐 5. 国际化 (i18n) 支持
- **自动检测**：根据浏览器语言自动切换
- **双语支持**：中文/英文无缝切换
- **URL切换**：`?lang=zh` 或 `?lang=en`

### 📊 6. 内置性能分析器
- **实时监控**：执行时间、内存使用、查询次数
- **可视化界面**：页面底部悬浮性能条
- **开发友好**：帮助快速定位性能瓶颈

### 🎨 7. 全息UI设计
- **玻璃态效果**：现代化半透明视觉
- **暗色主题**：默认暗色界面，护眼舒适
- **响应式布局**：适配各种设备

---

## 🚀 懒人一键安装

### 🎯 方案一：Git克隆（推荐）

```bash
# 1. 克隆项目
git clone https://github.com/lza6/PicoRoute-optimization.git

# 2. 进入目录
cd PicoRoute-optimization

# 3. 启动开发服务器
php -S localhost:8080

# 4. 浏览器访问 http://localhost:8080 🎉
```

### 🎯 方案二：直接下载ZIP

1. 访问 [GitHub仓库](https://github.com/lza6/PicoRoute-optimization)
2. 点击绿色 **"Code"** 按钮
3. 选择 **"Download ZIP"**
4. 解压后运行 `php -S localhost:8080`

### 🎯 方案三：一行命令安装（极简）

```bash
# 使用 wget
wget -O index.php https://raw.githubusercontent.com/lza6/PicoRoute-optimization/main/index.php && php -S localhost:8080

# 或使用 curl
curl -o index.php https://raw.githubusercontent.com/lza6/PicoRoute-optimization/main/index.php && php -S localhost:8080
```

### 🎯 方案四：Windows用户专属

双击运行项目中的 `start.bat` 文件即可自动启动！

---

## 🛠️ 环境要求

- ✅ **PHP 8.0+** （推荐8.1或更高版本）
- ✅ **PDO扩展** （如需数据库功能）
- ✅ **Web服务器** （可选：Apache/Nginx/内置服务器）

---

## 💡 使用示例

### 📝 基础路由

```php
<?php
require_once 'index.php';

$app = new Pico\App();
$router = $app->router;

// 简单路由
$router->get('/', function() {
    return Pico\Response::html('<h1>Hello World!</h1>');
});

// 带参数路由
$router->get('/user/{id}', function($id) {
    return Pico\Response::json(['user_id' => $id]);
});

$app->run();
```

### 🛡️ 中间件使用

```php
// 定义认证中间件
class AuthMiddleware {
    public function handle(Pico\Request $req, $next) {
        if (!isset($req->headers['Authorization'])) {
            return Pico\Response::json(['error' => '未授权'], 401);
        }
        return $next($req);
    }
}

// 应用中间件到路由组
$router->group(['middleware' => [AuthMiddleware::class]], function($r) {
    $r->get('/api/protected', function() {
        return Pico\Response::json(['secret' => 'data']);
    });
});
```

### 🗄️ 数据库操作

```php
// 配置数据库
Pico\DB::connect([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'mydb',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4'
]);

// 执行查询
$users = Pico\DB::query("SELECT * FROM users WHERE age > ?", [18]);
$user = Pico\DB::first("SELECT * FROM users WHERE id = ?", [1]);
```

### 🌍 国际化使用

```php
// 获取翻译文本
$message = Pico\Lang::get('app.welcome');

// 切换语言
Pico\Lang::switchTo('en');

// URL中指定语言
// http://example.com/?lang=en
```

---

## 🧠 技术原理详解

### 🔬 O(1) 路由算法原理

传统路由需要遍历所有规则，时间复杂度为 **O(n)**。PicoRoute采用优化策略：

```
┌─────────────────────────────────────────────────────────┐
│  路由匹配流程                                             │
├─────────────────────────────────────────────────────────┤
│  1. 优先精确匹配 (O(1))                                   │
│     if (isset($routes[$uri])) → 直接返回                  │
│                                                         │
│  2. 动态正则匹配 (优化后)                                  │
│     将 /user/{id} 预编译为 #^/user/(?P<id>[^/]+)$#       │
│     使用 preg_match 进行匹配                              │
└─────────────────────────────────────────────────────────┘
```

### 🧅 洋葱模型中间件

```
请求进入
    ↓
┌─────────────┐
│ 中间件 A    │ ← 前置处理
│   ┌─────────┴───┐
│   │ 中间件 B    │ ← 前置处理
│   │   ┌─────────┴───┐
│   │   │ 中间件 C    │ ← 前置处理
│   │   │   ┌─────────┴───┐
│   │   │   │   控制器    │ ← 核心业务逻辑
│   │   │   └─────────────┘
│   │   │ 中间件 C    │ ← 后置处理
│   │   └─────────────┘
│   │ 中间件 B    │ ← 后置处理
│   └─────────────┘
│ 中间件 A    │ ← 后置处理
└─────────────┘
    ↓
响应返回
```

### 💉 依赖注入容器原理

使用PHP反射API自动解析依赖：

```php
// 容器通过反射分析构造函数
$ref = new ReflectionClass($class);
$ctor = $ref->getConstructor();

// 自动解析参数类型
$params = array_map(function ($param) {
    $type = $param->getType();
    if ($type && !$type->isBuiltin()) {
        return $this->get($type->getName()); // 递归解析
    }
}, $ctor->getParameters());

// 创建实例
return $ref->newInstanceArgs($params);
```

---

## 📂 完整文件结构

```
PicoRoute-optimization/
├── 📄 index.php              # 🧠 框架核心 - 单文件包含所有功能
├── 📖 README.md              # 📚 项目说明文档（本文件）
├── 📜 LICENSE                # ⚖️ Apache 2.0 开源许可证
├── 🚀 start.bat              # ▶️ Windows快速启动脚本
├── 📋 project_specs.md       # 📊 项目规格与进度文档
├── 🗄️ db_structure.md        # 💾 数据库结构文档
└── 🚫 .gitignore             # 🙈 Git忽略规则
```

### 📁 核心文件说明

| 文件 | 说明 | 行数 |
|------|------|------|
| `index.php` | 框架核心，包含所有功能 | ~819行 |
| `README.md` | 项目文档 | 本文件 |
| `LICENSE` | Apache 2.0许可证 | 标准模板 |
| `start.bat` | Windows启动脚本 | 简单批处理 |

---

## 🌟 优势与价值

### ✅ 项目带来的好处

1. **🎓 教育价值**
   - 学习现代PHP框架设计原理
   - 理解依赖注入、中间件等核心概念
   - 单文件便于阅读和理解整体架构

2. **⚡ 开发效率**
   - 零配置，即插即用
   - 单文件部署，上传即可运行
   - 直观的API设计，降低学习成本

3. **🔒 安全性**
   - 参数化查询防止SQL注入
   - 内置CSRF保护机制
   - 安全HTTP头部设置

4. **🌍 国际化**
   - 自动语言检测
   - 支持多语言扩展
   - 本地化用户体验

### ⚠️ 局限性与不足

| 方面 | 说明 | 改进方向 |
|------|------|----------|
| **扩展性** | 单文件限制，大型项目维护困难 | 未来支持模块化 |
| **功能** | 缺少ORM、缓存、队列等高级功能 | v4.0计划添加 |
| **生态** | 无Composer生态支持 | 保持零依赖理念 |
| **工具** | 缺少CLI工具和代码生成器 | 计划开发CLI |

---

## 🏗️ 适用场景

### 🎯 推荐使用场景

- ✅ **微服务/API网关** - 轻量级服务接口
- ✅ **快速原型开发** - MVP和概念验证
- ✅ **教学演示** - 框架原理学习
- ✅ **个人项目** - 博客、小工具等
- ✅ **嵌入式应用** - IoT设备管理界面
- ✅ **共享主机** - 资源受限环境

### 🚫 不推荐场景

- ❌ 大型企业级应用
- ❌ 需要复杂ORM的项目
- ❌ 高并发实时应用
- ❌ 需要丰富生态支持的项目

---

## 🔮 未来发展规划

### 🚀 v4.0 计划（开发中）

- [ ] **缓存系统** - Redis/Memcached集成
- [ ] **WebSocket支持** - 实时双向通信
- [ ] **API限流** - 请求频率控制
- [ ] **JWT认证** - 现代化身份验证

### 🌟 v5.0 愿景

- [ ] **ORM集成** - 对象关系映射
- [ ] **CLI工具** - 命令行代码生成
- [ ] **插件系统** - 模块化扩展
- [ ] **API文档生成** - 自动生成OpenAPI文档

---

## 🛠️ 技术深度解析

### 📊 核心类说明

#### `Lang` 类 - 国际化系统
```php
// 位置: index.php 第35-203行
// 功能: 多语言支持、自动检测、语言切换
```

#### `Container` 类 - 依赖注入容器
```php
// 位置: index.php 第206-275行
// 功能: 服务绑定、单例管理、自动装配
```

#### `Pipeline` 类 - 中间件管道
```php
// 位置: index.php 第278-315行
// 功能: 洋葱模型中间件执行流程
```

#### `Request` 类 - HTTP请求
```php
// 位置: index.php 第318-353行
// 功能: 请求捕获、参数获取、JSON检测
```

#### `Response` 类 - HTTP响应
```php
// 位置: index.php 第355-396行
// 功能: JSON/HTML响应、头部设置、内容发送
```

#### `DB` 类 - 数据库操作
```php
// 位置: index.php 第399-433行
// 功能: PDO封装、参数化查询、性能监控
```

#### `Profiler` 类 - 性能分析
```php
// 位置: index.php 第436-485行
// 功能: 执行时间、内存使用、查询统计
```

#### `Router` 类 - 路由系统
```php
// 位置: index.php 第488-562行
// 功能: O(1)路由匹配、参数捕获、中间件调度
```

#### `App` 类 - 应用主类
```php
// 位置: index.php 第565-635行
// 功能: 容器初始化、请求分发、异常处理
```

---

## 🔧 扩展开发指南

### 1️⃣ 添加自定义中间件

```php
class LoggingMiddleware {
    public function handle(Request $request, $next) {
        $start = microtime(true);
        $response = $next($request);
        $time = (microtime(true) - $start) * 1000;
        
        error_log("{$request->method} {$request->uri} - {$time}ms");
        return $response;
    }
}

// 使用
$router->group(['middleware' => [LoggingMiddleware::class]], function($r) {
    // 路由定义
});
```

### 2️⃣ 扩展响应类型

```php
// XML响应
function xmlResponse($data, $status = 200) {
    $xml = new SimpleXMLElement('<response/>');
    array_walk_recursive($data, function($v, $k) use ($xml) {
        $xml->addChild($k, $v);
    });
    
    return new Response($xml->asXML(), $status, [
        'Content-Type' => 'application/xml'
    ]);
}
```

### 3️⃣ 数据库事务支持

```php
class ExtendedDB extends DB {
    public static function transaction(Closure $callback) {
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
```

---

## 🐛 当前状态与待办事项

### ✅ 已完成 (v3.0)

- [x] O(1) 编译正则路由
- [x] 洋葱中间件架构
- [x] 依赖注入容器
- [x] 数据库查询构建器
- [x] 性能分析器
- [x] 国际化支持 (i18n)
- [x] 全息UI设计
- [x] 安全头部保护

### 🚧 待实现

- [ ] 缓存系统
- [ ] WebSocket支持
- [ ] API限流
- [ ] JWT认证
- [ ] 文件上传处理
- [ ] 数据验证器
- [ ] 日志系统
- [ ] CLI工具

---

## 🤝 贡献指南

我们欢迎所有形式的贡献！

1. **Fork** 本仓库
2. 创建你的 **Feature Branch** (`git checkout -b feature/AmazingFeature`)
3. **Commit** 你的更改 (`git commit -m 'Add some AmazingFeature'`)
4. **Push** 到分支 (`git push origin feature/AmazingFeature`)
5. 打开 **Pull Request**

---

## 💖 支持项目

如果这个项目对你有帮助，请给我们一颗 ⭐ Star！

[![Star History Chart](https://api.star-history.com/svg?repos=lza6/PicoRoute-optimization&type=Date)](https://star-history.com/#lza6/PicoRoute-optimization&Date)

---

## 📞 联系我们

- 🐛 **Bug报告**: [GitHub Issues](https://github.com/lza6/PicoRoute-optimization/issues)
- 💡 **功能建议**: [GitHub Discussions](https://github.com/lza6/PicoRoute-optimization/discussions)
- 📧 **邮件联系**: 通过GitHub主页联系

---

## 📈 技术路径蓝图

```
PicoRoute v3.0 (当前)
    │
    ├── O(1)路由系统
    ├── 洋葱中间件
    ├── 依赖注入容器
    ├── 国际化支持
    └── 性能分析器
    │
    ▼
v4.0 (开发中)
    │
    ├── 缓存系统 (Redis/Memcached)
    ├── WebSocket支持
    ├── API限流
    └── JWT认证
    │
    ▼
v5.0 (规划中)
    │
    ├── ORM集成
    ├── CLI工具
    ├── 插件系统
    └── API文档生成
```

---

## 🎨 设计哲学

> **"少即是多，简即是美"** 🌸

PicoRoute的设计遵循以下原则：

1. **🎯 极简主义** - 一个文件解决所有问题
2. **⚡ 性能优先** - 算法优化到极致
3. **🔒 安全第一** - 内置安全防护
4. **🌍 全球视野** - 国际化原生支持
5. **📚 教育价值** - 代码即文档

---

## 📖 参考资料

- [PHP: The Right Way](https://phptherightway.com/)
- [PSR-15: HTTP Server Middleware](https://www.php-fig.org/psr/psr-15/)
- [PHP Reflection API](https://www.php.net/manual/en/book.reflection.php)
- [PDO Manual](https://www.php.net/manual/en/book.pdo.php)

---

## ⚖️ 许可证

本项目采用 **Apache License 2.0** 开源许可证。

```
Copyright 2026 PicoRoute Team

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```

---

<div align="center">

**🌟 用代码改变世界，从PicoRoute开始 🌟**

[⬆ 回到顶部](#-picoroute-v30-hypernova---超新星版)

Made with ❤️ by [PicoRoute Team](https://github.com/lza6)

</div>
