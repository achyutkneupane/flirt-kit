import ThemeToggler from "@/Components/Components/ThemeToggler";
import useTheme from "@/Hooks/useTheme";
import { cn } from "@/Lib/Utils";
import { SharedData } from "@/Types/Types";
import { SiGithub } from "@icons-pack/react-simple-icons";
import { Link, usePage } from "@inertiajs/react";
import { motion } from "motion/react";
import { route } from "ziggy-js";

const Navbar = () => {
    const { siteSettings } = usePage<SharedData>().props;
    const appName = import.meta.env.VITE_APP_NAME || "FLIRT Kit";
    const { isDarkMode } = useTheme();

    const githubLink = "https://github.com/achyutkneupane/filament-inertia-kit";
    const iconClass = "cursor-pointer text-neutral-800 dark:text-neutral-300";

    const hasLogo = siteSettings.logo && siteSettings.logo !== "";

    return (
        <motion.div
            className={cn(
                "shadow-input fixed inset-x-0 top-4 z-50 mx-auto max-w-7xl rounded-full lg:top-12",
                "flex items-center justify-between space-x-4 bg-black/50 px-12 py-6",
                "border-2 border-neutral-300/30 dark:border-neutral-700/60",
            )}
            initial={{
                y: -20,
                backgroundColor: "#00000000",
                backdropFilter: "blur(0px)",
                WebkitBackdropFilter: "blur(0px)",
            }}
            animate={
                isDarkMode
                    ? {
                          y: 0,
                          backgroundColor: "#00000050",
                          backdropFilter: "blur(4px)",
                          WebkitBackdropFilter: "blur(4px)",
                      }
                    : {
                          y: 0,
                          backgroundColor: "#ffffff20",
                          backdropFilter: "blur(4px)",
                          WebkitBackdropFilter: "blur(4px)",
                      }
            }
            transition={{ duration: 0.5 }}
        >
            <Link href={route("landing-page")} className="flex items-center gap-3" prefetch cacheFor={60}>
                {hasLogo ? (
                    <img src={siteSettings.logo} alt={siteSettings.name ?? appName} className="max-h-16 max-w-full object-cover" />
                ) : (
                    <h1
                        className={cn(
                            "relative bg-gradient-to-r font-bold text-transparent",
                            "select-none",
                            "text-xl md:text-2xl lg:text-3xl",
                            "from-neutral-700 to-neutral-400 bg-clip-text",
                            "dark:from-neutral-400 dark:to-neutral-700",
                        )}
                    >
                        {siteSettings.name ?? appName}
                    </h1>
                )}
            </Link>
            <div className="flex flex-row items-center justify-end gap-3">
                <Link
                    href={route("contact.form")}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="text-black dark:text-white"
                    prefetch
                    cacheFor={60}
                >
                    Contact Us
                </Link>
                <a href={githubLink} target="_blank" rel="noopener noreferrer" className="ml-8">
                    <SiGithub className={iconClass} />
                </a>
                <ThemeToggler className={iconClass} />
            </div>
        </motion.div>
    );
};

export default Navbar;
