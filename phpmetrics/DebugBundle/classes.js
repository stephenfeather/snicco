var classes = [
    {
        "name": "Snicco\\Bundle\\Debug\\DebugBundle",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "shouldRun",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configure",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "register",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "bootstrap",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "alias",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureHttpRouting",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "registerHttpDebugServices",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "allDirectoriesExpectVendor",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "copyConfiguration",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 9,
        "nbMethodsPrivate": 4,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 17,
        "ccn": 9,
        "ccnMethodMax": 4,
        "externals": [
            "Snicco\\Component\\Kernel\\Bundle",
            "Snicco\\Component\\Kernel\\ValueObject\\Environment",
            "Snicco\\Component\\Kernel\\Configuration\\WritableConfig",
            "Snicco\\Component\\Kernel\\Kernel",
            "Snicco\\Component\\Kernel\\Kernel",
            "Snicco\\Component\\Kernel\\Kernel",
            "Snicco\\Component\\Kernel\\Configuration\\WritableConfig",
            "Snicco\\Component\\Kernel\\Kernel",
            "Snicco\\Component\\Kernel\\Kernel",
            "Whoops\\Run",
            "Snicco\\Bundle\\Debug\\FilterablePrettyPageHandler",
            "Snicco\\Bundle\\Debug\\Displayer\\WhoopsHtmlDisplayer",
            "Whoops\\Handler\\JsonResponseHandler",
            "Snicco\\Bundle\\Debug\\Displayer\\WhoopsJsonDisplayer",
            "Snicco\\Component\\Kernel\\ValueObject\\Directories",
            "RecursiveDirectoryIterator",
            "Snicco\\Component\\Kernel\\Kernel",
            "RuntimeException"
        ],
        "parents": [],
        "implements": [
            "Snicco\\Component\\Kernel\\Bundle"
        ],
        "lcom": 5,
        "length": 129,
        "vocabulary": 29,
        "volume": 626.68,
        "difficulty": 12.26,
        "effort": 7683.64,
        "level": 0.08,
        "bugs": 0.21,
        "time": 427,
        "intelligentContent": 51.11,
        "number_operators": 35,
        "number_operands": 94,
        "number_operators_unique": 6,
        "number_operands_unique": 23,
        "cloc": 13,
        "loc": 104,
        "lloc": 91,
        "mi": 62.51,
        "mIwoC": 36.47,
        "commentWeight": 26.04,
        "kanDefect": 0.8,
        "relativeStructuralComplexity": 900,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 900.33,
        "totalStructuralComplexity": 8100,
        "totalDataComplexity": 2.94,
        "totalSystemComplexity": 8102.94,
        "package": "Snicco\\Bundle\\Debug\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 12,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Snicco\\Bundle\\Debug\\Option\\DebugOption",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 3,
        "vocabulary": 3,
        "volume": 4.75,
        "difficulty": 0,
        "effort": 0,
        "level": 2,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 9.51,
        "number_operators": 0,
        "number_operands": 3,
        "number_operators_unique": 0,
        "number_operands_unique": 3,
        "cloc": 12,
        "loc": 19,
        "lloc": 7,
        "mi": 123.84,
        "mIwoC": 76.69,
        "commentWeight": 47.14,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "Snicco\\Bundle\\Debug\\Option\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "Snicco\\Bundle\\Debug\\FilterablePrettyPageHandler",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "getExceptionFrames",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 4,
        "ccnMethodMax": 4,
        "externals": [
            "Whoops\\Handler\\PrettyPageHandler",
            "Whoops\\Exception\\FrameCollection"
        ],
        "parents": [
            "Whoops\\Handler\\PrettyPageHandler"
        ],
        "implements": [],
        "lcom": 1,
        "length": 29,
        "vocabulary": 11,
        "volume": 100.32,
        "difficulty": 5.83,
        "effort": 585.22,
        "level": 0.17,
        "bugs": 0.03,
        "time": 33,
        "intelligentContent": 17.2,
        "number_operators": 15,
        "number_operands": 14,
        "number_operators_unique": 5,
        "number_operands_unique": 6,
        "cloc": 6,
        "loc": 28,
        "lloc": 22,
        "mi": 89.03,
        "mIwoC": 56.16,
        "commentWeight": 32.86,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 17,
        "totalStructuralComplexity": 16,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 17,
        "package": "Snicco\\Bundle\\Debug\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "Snicco\\Bundle\\Debug\\Displayer\\WhoopsJsonDisplayer",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "display",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "supportedContentType",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isVerbose",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "canDisplay",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 4,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\ExceptionDisplayer",
            "Whoops\\Run",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation"
        ],
        "parents": [],
        "implements": [
            "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\ExceptionDisplayer"
        ],
        "lcom": 4,
        "length": 13,
        "vocabulary": 6,
        "volume": 33.6,
        "difficulty": 2,
        "effort": 67.21,
        "level": 0.5,
        "bugs": 0.01,
        "time": 4,
        "intelligentContent": 16.8,
        "number_operators": 5,
        "number_operands": 8,
        "number_operators_unique": 2,
        "number_operands_unique": 4,
        "cloc": 0,
        "loc": 25,
        "lloc": 25,
        "mi": 58.68,
        "mIwoC": 58.68,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 1.53,
        "relativeSystemComplexity": 5.53,
        "totalStructuralComplexity": 20,
        "totalDataComplexity": 7.67,
        "totalSystemComplexity": 27.67,
        "package": "Snicco\\Bundle\\Debug\\Displayer\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Snicco\\Bundle\\Debug\\Displayer\\WhoopsHtmlDisplayer",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "display",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "supportedContentType",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isVerbose",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "canDisplay",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 4,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\ExceptionDisplayer",
            "Whoops\\Run",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation"
        ],
        "parents": [],
        "implements": [
            "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\ExceptionDisplayer"
        ],
        "lcom": 4,
        "length": 13,
        "vocabulary": 6,
        "volume": 33.6,
        "difficulty": 2,
        "effort": 67.21,
        "level": 0.5,
        "bugs": 0.01,
        "time": 4,
        "intelligentContent": 16.8,
        "number_operators": 5,
        "number_operands": 8,
        "number_operators_unique": 2,
        "number_operands_unique": 4,
        "cloc": 0,
        "loc": 25,
        "lloc": 25,
        "mi": 58.68,
        "mIwoC": 58.68,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 1.53,
        "relativeSystemComplexity": 5.53,
        "totalStructuralComplexity": 20,
        "totalDataComplexity": 7.67,
        "totalSystemComplexity": 27.67,
        "package": "Snicco\\Bundle\\Debug\\Displayer\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    }
]