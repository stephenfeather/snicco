var classes = [
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\FallbackDisplayer",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
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
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\ExceptionDisplayer",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
            "RuntimeException",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation"
        ],
        "parents": [],
        "lcom": 4,
        "length": 41,
        "vocabulary": 20,
        "volume": 177.2,
        "difficulty": 4.83,
        "effort": 856.46,
        "level": 0.21,
        "bugs": 0.06,
        "time": 48,
        "intelligentContent": 36.66,
        "number_operators": 12,
        "number_operands": 29,
        "number_operators_unique": 5,
        "number_operands_unique": 15,
        "cloc": 2,
        "loc": 29,
        "lloc": 27,
        "mi": 72.55,
        "mIwoC": 52.76,
        "commentWeight": 19.79,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.9,
        "relativeSystemComplexity": 16.9,
        "totalStructuralComplexity": 64,
        "totalDataComplexity": 3.6,
        "totalSystemComplexity": 67.6,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\Log\\RequestAwareLogger",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "log",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addLogLevel",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "determineLogLevel",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 7,
        "ccnMethodMax": 5,
        "externals": [
            "Psr\\Log\\LoggerInterface",
            "Snicco\\Component\\Psr7ErrorHandler\\Log\\RequestLogContext",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
            "Psr\\Http\\Message\\RequestInterface",
            "Throwable"
        ],
        "parents": [],
        "lcom": 1,
        "length": 66,
        "vocabulary": 21,
        "volume": 289.89,
        "difficulty": 6.24,
        "effort": 1807.57,
        "level": 0.16,
        "bugs": 0.1,
        "time": 100,
        "intelligentContent": 46.49,
        "number_operators": 13,
        "number_operands": 53,
        "number_operators_unique": 4,
        "number_operands_unique": 17,
        "cloc": 12,
        "loc": 53,
        "lloc": 41,
        "mi": 80.25,
        "mIwoC": 46.64,
        "commentWeight": 33.61,
        "kanDefect": 0.98,
        "relativeStructuralComplexity": 64,
        "relativeDataComplexity": 0.47,
        "relativeSystemComplexity": 64.47,
        "totalStructuralComplexity": 256,
        "totalDataComplexity": 1.89,
        "totalSystemComplexity": 257.89,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\Log\\",
        "pageRank": 0,
        "afferentCoupling": 2,
        "efferentCoupling": 5,
        "instability": 0.71,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "statusCode",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "identifier",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "safeTitle",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "originalException",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "transformedException",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "safeDetails",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 6,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Throwable",
            "Throwable",
            "Throwable",
            "Throwable"
        ],
        "parents": [],
        "lcom": 1,
        "length": 36,
        "vocabulary": 9,
        "volume": 114.12,
        "difficulty": 3.43,
        "effort": 391.26,
        "level": 0.29,
        "bugs": 0.04,
        "time": 22,
        "intelligentContent": 33.28,
        "number_operators": 12,
        "number_operands": 24,
        "number_operators_unique": 2,
        "number_operands_unique": 7,
        "cloc": 0,
        "loc": 43,
        "lloc": 43,
        "mi": 49.83,
        "mIwoC": 49.83,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 6.86,
        "relativeSystemComplexity": 6.86,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 48,
        "totalSystemComplexity": 48,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\Information\\",
        "pageRank": 0,
        "afferentCoupling": 12,
        "efferentCoupling": 1,
        "instability": 0.08,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\Information\\InformationProviderWithTransformation",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "fromDefaultData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createFor",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addMessage",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "transform",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getData",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 6,
        "nbMethodsPrivate": 3,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 19,
        "ccn": 14,
        "ccnMethodMax": 6,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformationProvider",
            "Snicco\\Component\\Psr7ErrorHandler\\Identifier\\ExceptionIdentifier",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionTransformer",
            "InvalidArgumentException",
            "Snicco\\Component\\Psr7ErrorHandler\\Identifier\\ExceptionIdentifier",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionTransformer",
            "RuntimeException",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
            "Throwable",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
            "InvalidArgumentException",
            "InvalidArgumentException",
            "InvalidArgumentException",
            "Throwable",
            "Throwable",
            "Throwable",
            "Throwable"
        ],
        "parents": [],
        "lcom": 2,
        "length": 149,
        "vocabulary": 38,
        "volume": 781.94,
        "difficulty": 15.07,
        "effort": 11781.25,
        "level": 0.07,
        "bugs": 0.26,
        "time": 655,
        "intelligentContent": 51.9,
        "number_operators": 36,
        "number_operands": 113,
        "number_operators_unique": 8,
        "number_operands_unique": 30,
        "cloc": 23,
        "loc": 94,
        "lloc": 71,
        "mi": 72.15,
        "mIwoC": 37.48,
        "commentWeight": 34.67,
        "kanDefect": 1.1,
        "relativeStructuralComplexity": 49,
        "relativeDataComplexity": 0.75,
        "relativeSystemComplexity": 49.75,
        "totalStructuralComplexity": 294,
        "totalDataComplexity": 4.5,
        "totalSystemComplexity": 298.5,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\Information\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 7,
        "instability": 0.88,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\HttpException",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "fromPrevious",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "headers",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "statusCode",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "RuntimeException",
            "Throwable",
            "Throwable"
        ],
        "parents": [
            "RuntimeException"
        ],
        "lcom": 2,
        "length": 29,
        "vocabulary": 10,
        "volume": 96.34,
        "difficulty": 3,
        "effort": 289.01,
        "level": 0.33,
        "bugs": 0.03,
        "time": 16,
        "intelligentContent": 32.11,
        "number_operators": 5,
        "number_operands": 24,
        "number_operators_unique": 2,
        "number_operands_unique": 8,
        "cloc": 12,
        "loc": 36,
        "lloc": 24,
        "mi": 94.86,
        "mIwoC": 55.87,
        "commentWeight": 38.99,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 1.25,
        "relativeSystemComplexity": 10.25,
        "totalStructuralComplexity": 36,
        "totalDataComplexity": 5,
        "totalSystemComplexity": 41,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\",
        "pageRank": 0,
        "afferentCoupling": 6,
        "efferentCoupling": 2,
        "instability": 0.25,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\HttpErrorHandler",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "handle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "logException",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createResponse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findBestDisplayer",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "handleDisplayError",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "withHttpHeaders",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 7,
        "nbMethodsPrivate": 5,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 13,
        "ccn": 7,
        "ccnMethodMax": 4,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\HttpErrorHandlerInterface",
            "Psr\\Http\\Message\\ResponseFactoryInterface",
            "Snicco\\Component\\Psr7ErrorHandler\\Log\\RequestAwareLogger",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformationProvider",
            "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\DisplayerFilter",
            "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\ExceptionDisplayer",
            "Psr\\Http\\Message\\ResponseInterface",
            "Throwable",
            "Psr\\Http\\Message\\ServerRequestInterface",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
            "Psr\\Http\\Message\\RequestInterface",
            "Psr\\Http\\Message\\ResponseInterface",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
            "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\ExceptionDisplayer",
            "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\ExceptionDisplayer",
            "Psr\\Http\\Message\\RequestInterface",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation",
            "Snicco\\Component\\Psr7ErrorHandler\\Displayer\\FallbackDisplayer",
            "Psr\\Http\\Message\\ResponseInterface",
            "Throwable",
            "Psr\\Http\\Message\\RequestInterface",
            "Psr\\Http\\Message\\ResponseInterface",
            "Throwable",
            "Psr\\Http\\Message\\ResponseInterface"
        ],
        "parents": [],
        "lcom": 1,
        "length": 121,
        "vocabulary": 28,
        "volume": 581.69,
        "difficulty": 13.09,
        "effort": 7614.85,
        "level": 0.08,
        "bugs": 0.19,
        "time": 423,
        "intelligentContent": 44.43,
        "number_operators": 25,
        "number_operands": 96,
        "number_operators_unique": 6,
        "number_operands_unique": 22,
        "cloc": 6,
        "loc": 73,
        "lloc": 67,
        "mi": 61.35,
        "mIwoC": 39.87,
        "commentWeight": 21.48,
        "kanDefect": 0.52,
        "relativeStructuralComplexity": 256,
        "relativeDataComplexity": 0.55,
        "relativeSystemComplexity": 256.55,
        "totalStructuralComplexity": 1792,
        "totalDataComplexity": 3.88,
        "totalSystemComplexity": 1795.88,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 12,
        "instability": 0.92,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\Identifier\\SplHashIdentifier",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "identify",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\Identifier\\ExceptionIdentifier",
            "Throwable"
        ],
        "parents": [],
        "lcom": 1,
        "length": 3,
        "vocabulary": 2,
        "volume": 3,
        "difficulty": 1,
        "effort": 3,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 3,
        "number_operators": 1,
        "number_operands": 2,
        "number_operators_unique": 1,
        "number_operands_unique": 1,
        "cloc": 0,
        "loc": 8,
        "lloc": 8,
        "mi": 76.82,
        "mIwoC": 76.82,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 2,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 2,
        "totalSystemComplexity": 2,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\Identifier\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\Delegating",
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
                "name": "filter",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\DisplayerFilter",
            "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\DisplayerFilter",
            "Psr\\Http\\Message\\RequestInterface",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation"
        ],
        "parents": [],
        "lcom": 1,
        "length": 17,
        "vocabulary": 7,
        "volume": 47.73,
        "difficulty": 2.8,
        "effort": 133.63,
        "level": 0.36,
        "bugs": 0.02,
        "time": 7,
        "intelligentContent": 17.04,
        "number_operators": 3,
        "number_operands": 14,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 3,
        "loc": 19,
        "lloc": 16,
        "mi": 90.58,
        "mIwoC": 61.71,
        "commentWeight": 28.87,
        "kanDefect": 0.38,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1.5,
        "relativeSystemComplexity": 2.5,
        "totalStructuralComplexity": 2,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 5,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\ContentType",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "filter",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\DisplayerFilter",
            "Psr\\Http\\Message\\RequestInterface",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation"
        ],
        "parents": [],
        "lcom": 1,
        "length": 34,
        "vocabulary": 14,
        "volume": 129.45,
        "difficulty": 3.41,
        "effort": 441.31,
        "level": 0.29,
        "bugs": 0.04,
        "time": 25,
        "intelligentContent": 37.97,
        "number_operators": 9,
        "number_operands": 25,
        "number_operators_unique": 3,
        "number_operands_unique": 11,
        "cloc": 5,
        "loc": 21,
        "lloc": 16,
        "mi": 92.84,
        "mIwoC": 58.54,
        "commentWeight": 34.3,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 10,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 2,
        "totalSystemComplexity": 20,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\Verbosity",
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
                "name": "filter",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\DisplayerFilter",
            "Psr\\Http\\Message\\RequestInterface",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation"
        ],
        "parents": [],
        "lcom": 1,
        "length": 14,
        "vocabulary": 9,
        "volume": 44.38,
        "difficulty": 2.5,
        "effort": 110.95,
        "level": 0.4,
        "bugs": 0.01,
        "time": 6,
        "intelligentContent": 17.75,
        "number_operators": 4,
        "number_operands": 10,
        "number_operators_unique": 3,
        "number_operands_unique": 6,
        "cloc": 0,
        "loc": 15,
        "lloc": 15,
        "mi": 62.54,
        "mIwoC": 62.54,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 2,
        "relativeSystemComplexity": 3,
        "totalStructuralComplexity": 2,
        "totalDataComplexity": 4,
        "totalSystemComplexity": 6,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\CanDisplay",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "filter",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\DisplayerFilter",
            "Psr\\Http\\Message\\RequestInterface",
            "Snicco\\Component\\Psr7ErrorHandler\\Information\\ExceptionInformation"
        ],
        "parents": [],
        "lcom": 1,
        "length": 10,
        "vocabulary": 5,
        "volume": 23.22,
        "difficulty": 1,
        "effort": 23.22,
        "level": 1,
        "bugs": 0.01,
        "time": 1,
        "intelligentContent": 23.22,
        "number_operators": 2,
        "number_operands": 8,
        "number_operators_unique": 1,
        "number_operands_unique": 4,
        "cloc": 0,
        "loc": 10,
        "lloc": 10,
        "mi": 68.49,
        "mIwoC": 68.49,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 2.5,
        "relativeSystemComplexity": 3.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 2.5,
        "totalSystemComplexity": 3.5,
        "package": "Snicco\\Component\\Psr7ErrorHandler\\DisplayerFilter\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    }
]